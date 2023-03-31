package GUIs;

import Connection.DBorder;


import javax.swing.*;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;

import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.GridLayout;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.table.TableRowSorter;

//import java.awt.*;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Vector;

public class OrderGUI extends JFrame implements ActionListener {

	private JPanel contentPane;
	private JTable table;
	private JTextField searchField;
	private JComboBox<String> filterBox;
	private JButton searchBtn;
	private JButton changeOrderStatusBtn;
	private DefaultTableModel model;
	private JComboBox<String> orderStatusComboBox;
	private JButton viewMoreBtn;
	

	public OrderGUI() throws SQLException {
		setTitle("Orders");
		setIconImage(ImageIconMaker.createImageIcon());

		setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		setBounds(200, 200, 1200, 600);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);

		// create table model with columns
		model = new DefaultTableModel(){
        	//makes cells uneditable
            @Override
            public boolean isCellEditable(int row, int column) {
                return false; // make all cells non-editable
            }
        };
        
		model.addColumn("Order ID");
		model.addColumn("Account ID");
		model.addColumn("Address ID");
		model.addColumn("Order Status");
		model.addColumn("Order Total Price");
		model.addColumn("Created At");
		model.addColumn("Updated At");

		// retrieve orders from orderb table
		try {
			DBorder orders = new DBorder();
			ResultSet rs = orders.getAllOrders();

			while (rs.next()) {
				Object[] row = new Object[]{
				rs.getInt("Order_ID"),
				rs.getString("Account_ID"),
				rs.getString("Address_ID"),
				rs.getString("Order_Status"),
				"\u00A3" + rs.getString("Order_Total_Price"),
				rs.getString("created_at"),
				rs.getString("updated_at")	
			};
				model.addRow(row);
			}
	//		orders.closeConnection();
		} catch (SQLException e) {
			JOptionPane.showMessageDialog(null, "Error retrieving orders from database: " + e.getMessage());
		}

		// create table with model
		table = new JTable(model);
		String[] orderStatuses = { "Processing", "Shipped", "Delivered", "Canceled" };
		orderStatusComboBox = new JComboBox<String>(orderStatuses);
		orderStatusComboBox.addActionListener(this);
//		TableColumn orderStatusColumn = table.getColumnModel().getColumn(3);
//		orderStatusColumn.setCellEditor(new DefaultCellEditor(orderStatusComboBox));
		DefaultTableCellRenderer renderer = new DefaultTableCellRenderer();
        renderer.setHorizontalAlignment(JLabel.CENTER); // Align the image to the center
        table.getColumnModel().getColumn(0).setCellRenderer(renderer); // Set the renderer for column 0
        table.getColumnModel().getColumn(1).setCellRenderer(renderer);
        table.getColumnModel().getColumn(2).setCellRenderer(renderer);
        table.getColumnModel().getColumn(3).setCellRenderer(renderer);
        table.getColumnModel().getColumn(4).setCellRenderer(renderer);
        
		JScrollPane scrollPane = new JScrollPane(table);
		contentPane.add(scrollPane, BorderLayout.CENTER);
		table.setRowHeight(60);
        Font font = new Font("Calibri", Font.BOLD, 17);
        table.setFont(font);
        table.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        //columns cannot be reordered
        table.getTableHeader().setReorderingAllowed(false);
		
        // create search bar and filter by section
//		JPanel searchPanel = new JPanel(new BorderLayout());
//		JLabel searchLabel = new JLabel("Search by Order ID Or Account ID: ");
//		searchField = new JTextField();
//		searchField.addActionListener(this);
//		searchPanel.add(searchLabel, BorderLayout.WEST);
//		searchPanel.add(searchField, BorderLayout.CENTER);
        
        // NEW SEARCH PANEL
        JPanel searchPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel searchLabel = new JLabel("Search by Order/Account ID: ");
        searchField = new JTextField(20);
        searchField.addActionListener(this);
        searchBtn = new JButton("Search");
        searchBtn.addActionListener(this);
        searchPanel.add(searchLabel);
        searchPanel.add(searchField);
        searchPanel.add(searchBtn);

		//
		JPanel filterPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
		JLabel filterLabel = new JLabel("Filter by Order Status: ");
		String[] filterOptions = { "All", "Shipped", "Processing", "Delivered", "Canceled" };
		filterBox = new JComboBox<>(filterOptions);
		filterBox.addActionListener(this);
		filterPanel.add(filterLabel, BorderLayout.WEST);
		filterPanel.add(filterBox, BorderLayout.CENTER);

		JPanel searchFilterPanel = new JPanel(new BorderLayout());
		searchFilterPanel.add(searchPanel, BorderLayout.NORTH);
		searchFilterPanel.add(filterPanel, BorderLayout.CENTER);
		
		// create button for viewing products in order
		viewMoreBtn = new JButton("View Order Products");
		viewMoreBtn.addActionListener(this);

		// create submit button for Changing order Status
		changeOrderStatusBtn = new JButton("Change Order Status");
		changeOrderStatusBtn.addActionListener(this);

		// create label for options
		JLabel optionsLbl = new JLabel("Select a row and use the following option(s):       ");

		// create panel for options
		JPanel optionsPanel = new JPanel();
		optionsPanel.add(optionsLbl);
		optionsPanel.add(orderStatusComboBox);
		optionsPanel.add(changeOrderStatusBtn);
		optionsPanel.add(viewMoreBtn);

		// create panel for submit button
		JPanel submitPanel = new JPanel(new BorderLayout());
		submitPanel.add(optionsPanel, BorderLayout.EAST);

		// add searchFilterPanel and submitPanel to contentPane
		contentPane.add(searchFilterPanel, BorderLayout.NORTH);
		contentPane.add(submitPanel, BorderLayout.SOUTH);


		setVisible(true);
	}

	// filters the table based on search query or selected filters
	private void filterTable() {
		// Get the search query and filter option from the GUI elements
		String searchQuery = searchField.getText().trim();
		String filterOption = (String) filterBox.getSelectedItem();

		// Create a TableRowSorter for the JTable
		TableRowSorter<DefaultTableModel> sorter = new TableRowSorter<DefaultTableModel>(model);
		table.setRowSorter(sorter);

		// Set up the filter
		ArrayList<RowFilter<Object, Object>> filters = new ArrayList<RowFilter<Object, Object>>();
		filters.add(RowFilter.regexFilter("(?i)" + searchQuery, 0, 1)); // Case-insensitive search query filter in
																		// columns 0 and 1

		if (!filterOption.equals("All")) {
			// Create a filter for the selected Order Status
			RowFilter<Object, Object> statusFilter = RowFilter.regexFilter("(?i)" + filterOption, 3);
			filters.add(statusFilter);
		}

		// Apply the filters to the TableRowSorter
		sorter.setRowFilter(RowFilter.andFilter(filters));
	}
	
	public void refreshTable() {
			
		   // Clear the table
        model.setRowCount(0);
		try {
					DBorder orders = new DBorder();
					ResultSet rs = orders.getAllOrders();

					while (rs.next()) {
						
					}
//					orders.closeConnection();
				} catch (SQLException e) {
					JOptionPane.showMessageDialog(null, "Error retrieving orders from database: " + e.getMessage());
				}
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource() == searchField || e.getSource() == filterBox || e.getSource() == searchBtn) {
			filterTable();
		} else if (e.getSource() == searchBtn) {
			filterTable();
			
//			 String searchText = searchField.getText();
//			    if (searchText.trim().equals("")) {
//			        JOptionPane.showMessageDialog(this, "Search box is empty.");
//			    } else {
//			        filterTable();
//			    }
			
		} else if (e.getSource() == changeOrderStatusBtn) {
			// Get the selected status from the dropdown
			String selectedStatus = (String) orderStatusComboBox.getSelectedItem();
			int selectedRow = table.getSelectedRow();
			if (selectedRow == -1) { // if No show is selected and submitButton2 is pressed it is gonna show an error
				JOptionPane.showMessageDialog(this, "Please select a row to update.");
			} else {
				String orderId = model.getValueAt(selectedRow, 0).toString();
				try {
					DBorder db = new DBorder();
					int status = db.getStatus(selectedStatus);
					db.changeStatusOfOrder(orderId, status);

//					 Update the status in the table model
					model.setValueAt(selectedStatus, selectedRow, 3);
				} catch (SQLException ex) {
					JOptionPane.showMessageDialog(this, "Error updating order status: " + ex.getMessage());
				}
			}
		} else if (e.getSource() == viewMoreBtn) {
			 int selectedRow = table.getSelectedRow();
			 if (selectedRow == -1) { //if No show is selected and submitButton2 is pressed it is gonna show an error
	            JOptionPane.showMessageDialog(this, "Please select a row to view Order Products.");
			 }else {
		        	String orderId = model.getValueAt(selectedRow, 0).toString();
		            	//show this data in some alert
			try {
				DBorder db = new DBorder();
				 ResultSet rs = db.getOrderProductById(orderId);
		            JPanel panel = new JPanel(new GridLayout(0, 1)); // create parent panel
		            int productNum = 1;
		            while (rs.next()) {
		                String productID = rs.getString("Product_ID");
		                int amount = rs.getInt("Amount");
		                double price = rs.getDouble("Price");
		                int polID = rs.getInt("POL_ID");
		                JCheckBox checkBox = new JCheckBox("Product #" + productNum+ "    ");
		                productNum++;
		                String productDetails = String.format(" POL ID: %d\n Product ID: %s\n Quantity: %d\n Price: \u00A3%.2f\n\n", polID, productID, amount, price);
		                JPanel productPanel = new JPanel(new BorderLayout()); // create panel for each product
		                productPanel.add(checkBox, BorderLayout.NORTH);
		                JTextArea pDetails = new JTextArea(productDetails);
		                pDetails.setEditable(false);
		                productPanel.add(new JScrollPane(pDetails), BorderLayout.CENTER);
		                panel.add(productPanel); // add product panel to parent panel
		            }
		            ImageIcon icon = new ImageIcon("Image_Icon/Favicon.jpg");
		            Image image = icon.getImage().getScaledInstance(50, 50, Image.SCALE_SMOOTH); // set the desired dimensions (50x50)
		            ImageIcon resizedIcon = new ImageIcon(image);
		            JOptionPane.showMessageDialog(this, panel, "Order Products for Order ID #" + orderId, JOptionPane.INFORMATION_MESSAGE, resizedIcon); // pass parent panel as message
		        }  catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
       }
	}
}
	

	public static void main(String[] args) throws SQLException {
		new OrderGUI();
	}
}

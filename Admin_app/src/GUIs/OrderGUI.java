package GUIs;

import Connection.DBorder;

import javax.swing.*;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.table.TableRowSorter;


import java.awt.*;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Vector;


public class OrderGUI extends JFrame implements ActionListener {

    private JPanel contentPane;
    private JTable table;
    private JTextField searchField;
    private JComboBox<String> filterBox;
    private JButton submitButton;
    private DefaultTableModel model;


    public OrderGUI() throws SQLException{
        setTitle("Orders");
        setIconImage(new ImageIcon("Image_Icon/Favicon.jpg").getImage());

        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        setBounds(100, 100, 800, 600);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
        contentPane.setLayout(new BorderLayout(0, 0));
        setContentPane(contentPane);

        // create table model with columns
        model = new DefaultTableModel();
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
            	// creating Vector with data for each row
                Vector<String> row = new Vector<>();
                row.add(rs.getString("Order_ID"));
                row.add(rs.getString("Account_ID"));
                row.add(rs.getString("Address_ID"));
                row.add(rs.getString("Order_Status"));
                row.add("\u00A3" + rs.getString("Order_Total_Price"));
                row.add(rs.getString("created_at"));
                row.add(rs.getString("updated_at"));
                // add row to table model
                model.addRow(row);
            }
            orders.closeConnection();
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "Error retrieving orders from database: " + e.getMessage());
        }

        // create table with model
        table = new JTable(model);
        String[] orderStatuses = {"Processing", "Shipped", "Delivered", "Canceled"};
        JComboBox<String> orderStatusComboBox = new JComboBox<String>(orderStatuses);
        TableColumn orderStatusColumn = table.getColumnModel().getColumn(3);
        orderStatusColumn.setCellEditor(new DefaultCellEditor(orderStatusComboBox));
        
        
        JScrollPane scrollPane = new JScrollPane(table);
        contentPane.add(scrollPane, BorderLayout.CENTER);

        // create search bar and filter by section
        JPanel searchPanel = new JPanel(new BorderLayout());
        JLabel searchLabel = new JLabel("Search by Order ID Or Account ID: ");
        searchField = new JTextField();
        searchField.addActionListener(this);
        searchPanel.add(searchLabel, BorderLayout.WEST);
        searchPanel.add(searchField, BorderLayout.CENTER);

        //
        JPanel filterPanel = new JPanel(new BorderLayout());
        JLabel filterLabel = new JLabel("Filter by Order Status: ");
        String[] filterOptions = {"All", "Shipped", "Processing", "Delivered", "Canceled"};
        filterBox = new JComboBox<>(filterOptions);
        filterBox.addActionListener(this);
        filterPanel.add(filterLabel, BorderLayout.WEST);
        filterPanel.add(filterBox, BorderLayout.CENTER);

        JPanel searchFilterPanel = new JPanel(new BorderLayout());
        searchFilterPanel.add(searchPanel, BorderLayout.NORTH);
        searchFilterPanel.add(filterPanel, BorderLayout.CENTER);

        // create submit button for filtering
        submitButton = new JButton("Submit");
        submitButton.addActionListener(this);

        JPanel submitPanel = new JPanel(new FlowLayout(FlowLayout.RIGHT));
        submitPanel.add(submitButton);

        // add searchFilterPanel and submitPanel to contentPane
        contentPane.add(searchFilterPanel, BorderLayout.NORTH);
        contentPane.add(submitPanel, BorderLayout.SOUTH);

        setVisible(true);
    }
   
//    //filters the table based on search query or selected filters
//    private void filterTable() {
//    	// Get the search query and filter option from the GUI elements
//    	String searchQuery = searchField.getText().trim();
//    	String filterOption = (String) filterBox.getSelectedItem();
//
//    	
//    	// Create a TableRowSorter for the JTable
//    	TableRowSorter<DefaultTableModel> sorter = new TableRowSorter<DefaultTableModel>(model);
//    	table.setRowSorter(sorter);
//
//    	// Set up the filter
//    	ArrayList<RowFilter<Object, Object>> filters = new ArrayList<RowFilter<Object, Object>>();
//    	filters.add(RowFilter.regexFilter("(?i)" + searchQuery)); // Case-insensitive search query filter
//
//    	if (filterOption != "All") {
//    	    // Create a filter for the selected Order Status
//    	    RowFilter<Object, Object> statusFilter = RowFilter.regexFilter("(?i)" + filterOption, 3); 
//    	    filters.add(statusFilter);
//    	}
//
//    	// Apply the filters to the TableRowSorter
//    	sorter.setRowFilter(RowFilter.andFilter(filters));
//            
//        }
    
  //filters the table based on search query or selected filters
    private void filterTable() {
        // Get the search query and filter option from the GUI elements
        String searchQuery = searchField.getText().trim();
        String filterOption = (String) filterBox.getSelectedItem();

        // Create a TableRowSorter for the JTable
        TableRowSorter<DefaultTableModel> sorter = new TableRowSorter<DefaultTableModel>(model);
        table.setRowSorter(sorter);

        // Set up the filter
        ArrayList<RowFilter<Object, Object>> filters = new ArrayList<RowFilter<Object, Object>>();
        filters.add(RowFilter.regexFilter("(?i)" + searchQuery, 0, 1)); // Case-insensitive search query filter in columns 0 and 1

        if (!filterOption.equals("All")) {
            // Create a filter for the selected Order Status
            RowFilter<Object, Object> statusFilter = RowFilter.regexFilter("(?i)" + filterOption, 3);
            filters.add(statusFilter);
        }

        // Apply the filters to the TableRowSorter
        sorter.setRowFilter(RowFilter.andFilter(filters));
    }

    
    @Override
    public void actionPerformed(ActionEvent e) {
    	if (e.getSource() == searchField || e.getSource() == filterBox) {
    		filterTable();
    		} else if (e.getSource() == submitButton) {
    		filterTable();
    		}
    		}
    
    public static void main(String[] args) throws SQLException {
		new OrderGUI();
	}
}

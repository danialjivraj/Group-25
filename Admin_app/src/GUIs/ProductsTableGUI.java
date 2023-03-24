package GUIs;

import javax.swing.*;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.table.TableRowSorter;

import Connection.DBaccount;
import Connection.DBproductAndCategory;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.Font;


public class ProductsTableGUI extends JFrame implements ActionListener{

    private JTable table;
    private DefaultTableModel model;
    private JPanel contentPane;
    private JTextField searchField;
    private JComboBox<String> filterBox;
    private JButton submitButton;

    public ProductsTableGUI() throws SQLException{
        setTitle("All Products");
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        setSize(1400, 600);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
        contentPane.setLayout(new BorderLayout(0, 0));
        setContentPane(contentPane);

        // Create table model
        model = new DefaultTableModel();
        table = new JTable(model);
     // Increase font size for table
        Font tableFont = new Font(table.getFont().getName(), Font.PLAIN,15);
        table.setFont(tableFont);

        // Add columns to the table model
        model.addColumn("Product ID");
        model.addColumn("Category ID");
        model.addColumn("Product Name");
        model.addColumn("Product Price");
        model.addColumn("Stock");
        model.addColumn("In/Out of/Low Stock");
        model.addColumn("Description");


        // Add data to the table model
        try {
        	DBproductAndCategory dba = new DBproductAndCategory();
            ResultSet rs = dba.getProducts();
            while (rs.next()) {
            	String amount = rs.getString("Amount");
                Object[] row = new Object[]{
                        rs.getInt("Product_ID"),
                        rs.getString("Category_ID"),
                        rs.getString("Product_Name"),
                        "\u00A3"+ rs.getString("Product_Price"),
                        amount,
                        amount.equals("0") ? "Out of Stock" : (Integer.parseInt(amount) < 4 ? "Low Stock" : "In Stock"),
                        rs.getString("Description")
                };
                model.addRow(row);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

//        // Add the table to the frame
//        add(new JScrollPane(table));
//
//        setVisible(true);
        // create table with model
        table = new JTable(model);
        JScrollPane scrollPane = new JScrollPane(table);
        contentPane.add(scrollPane, BorderLayout.CENTER);

        // create search bar and filter by section
        JPanel searchPanel = new JPanel(new BorderLayout());
        JLabel searchLabel = new JLabel("Search by Product ID Or Product Name: ");
        searchField = new JTextField();
        searchField.addActionListener(this);
        searchPanel.add(searchLabel, BorderLayout.WEST);
        searchPanel.add(searchField, BorderLayout.CENTER);

        //
        JPanel filterPanel = new JPanel(new BorderLayout());
        JLabel filterLabel = new JLabel("Filter by Categories: ");
        String[] filterOptions = {"All", "5", "6", "7", "8", "9"};
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
    
    public static void main(String[] args) throws SQLException {
		new ProductsTableGUI();
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		
		if (e.getSource() == searchField || e.getSource() == filterBox) {
    		filterTable();
    		} else if (e.getSource() == submitButton) {
    		filterTable();
    		}
		
	}

	private void filterTable() {
	     // Get the search query and filter option from the GUI elements
        String searchQuery = searchField.getText().trim();
        String filterOption = (String) filterBox.getSelectedItem();

        // Create a TableRowSorter for the JTable
        TableRowSorter<DefaultTableModel> sorter = new TableRowSorter<DefaultTableModel>(model);
        table.setRowSorter(sorter);

        // Set up the filter
        ArrayList<RowFilter<Object, Object>> filters = new ArrayList<RowFilter<Object, Object>>();
        filters.add(RowFilter.regexFilter("(?i)" + searchQuery, 0, 2)); 

        if (!filterOption.equals("All")) {
            // Create a filter for the selected Order Status
            RowFilter<Object, Object> statusFilter = RowFilter.regexFilter("(?i)" + filterOption, 1);
            filters.add(statusFilter);
        }

        // Apply the filters to the TableRowSorter
        sorter.setRowFilter(RowFilter.andFilter(filters));
		
	}
}

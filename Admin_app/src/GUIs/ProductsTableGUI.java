package GUIs;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;

import Connection.DBaccount;
import Connection.DBproductAndCategory;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.awt.Font;


public class ProductsTableGUI extends JFrame {

    private JTable table;
    private DefaultTableModel model;

    public ProductsTableGUI() throws SQLException{
        setTitle("All Products");
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        setSize(1400, 600);
        setLocationRelativeTo(null);

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
                        rs.getString("Product_Price"),
                        amount,
                        amount.equals("0") ? "Out of Stock" : (Integer.parseInt(amount) < 4 ? "Low Stock" : "In Stock"),
                        rs.getString("Description")
                };
                model.addRow(row);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        // Add the table to the frame
        add(new JScrollPane(table));

        setVisible(true);
    }
}

package GUIs;

import Connection.DBorder;

import javax.swing.*;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;

import java.awt.*;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Vector;

public class OrderGUI extends JFrame {

    private JPanel contentPane;
    private JTable table;

    public OrderGUI() throws SQLException{
        setTitle("Orders");
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        setBounds(100, 100, 800, 600);
        contentPane = new JPanel();
        contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
        contentPane.setLayout(new BorderLayout(0, 0));
        setContentPane(contentPane);

        // create table model with columns
        DefaultTableModel model = new DefaultTableModel();
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
                // create vector with data for each row
                Vector<String> row = new Vector<>();
                row.add(rs.getString("Order_ID"));
                row.add(rs.getString("Account_ID"));
                row.add(rs.getString("Address_ID"));
                row.add(rs.getString("Order_Status"));
                row.add("£" + rs.getString("Order_Total_Price"));
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
        JScrollPane scrollPane = new JScrollPane(table);
        contentPane.add(scrollPane, BorderLayout.CENTER);
        setVisible(true);

    }
}

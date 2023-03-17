package GUIs;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;

import Connection.DBaccount;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.awt.Font;


public class UserTableGUI extends JFrame {

    private JTable table;
    private DefaultTableModel model;

    public UserTableGUI() throws SQLException{
        setTitle("All Users");
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
        model.addColumn("ID");
        model.addColumn("Name");
        model.addColumn("Email");
        model.addColumn("Phone Number");
        model.addColumn("User Status");
        model.addColumn("Created At");
        model.addColumn("Updated At");

        // Add data to the table model
        try {
        	DBaccount dba = new DBaccount();
            ResultSet rs = dba.getUsers();
            while (rs.next()) {
                Object[] row = new Object[]{
                        rs.getInt("id"),
                        rs.getString("name"),
                        rs.getString("email"),
                        rs.getString("Phone_Number"),
                        rs.getString("User_Status"),
                        rs.getString("created_at"),
                        rs.getString("updated_at")
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

//Remove this main method once testing is done
//    public static void main(String[] args) {
//        new UserTableGUI();
//    }
}
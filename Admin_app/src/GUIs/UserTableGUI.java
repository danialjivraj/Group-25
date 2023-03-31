package GUIs;

import javax.swing.*;
import javax.swing.event.DocumentEvent;
import javax.swing.event.DocumentListener;
import javax.swing.table.DefaultTableModel;

import Connection.DBaccount;
import Connection.DBproductAndCategory;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.FocusAdapter;
import java.awt.event.FocusEvent;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;


public class UserTableGUI extends JFrame implements ActionListener{

    private JTable table;
    private DefaultTableModel model;
    private JButton infoUF;
    private JTextField userFinder;
    private JLabel userFinderLbl;

    public UserTableGUI() throws SQLException{
        setTitle("All Users");
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        setSize(1400, 600);
        setLocationRelativeTo(null);
        setIconImage(ImageIconMaker.createImageIcon());

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
      
       
        
        JPanel searchPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        userFinderLbl = new JLabel("Enter User ID To Edit User");
        infoUF=new JButton("Edit User");
        userFinder = new JTextField(20);
        userFinder.setForeground(Color.GRAY);
        userFinder.getDocument().addDocumentListener(new DocumentListener() {
            @Override
            public void insertUpdate(DocumentEvent e) {
             //   filterTable();
            }

            @Override
            public void removeUpdate(DocumentEvent e) {
               
            }

            @Override
            public void changedUpdate(DocumentEvent e) {
               
            }
        });
//        // Add a focus listener to clear the placeholder text when the field is clicked
//        userFinder.addFocusListener(new FocusAdapter() {
//                @Override
//                public void focusGained(FocusEvent e) {
//                    if (userFinder.getText().equals(" Edit User Using User ID ")) {
//                    	userFinder.setText("");
//                    	userFinder.setForeground(Color.BLACK);
//                    }
//                }
//
//                @Override
//                public void focusLost(FocusEvent e) {
//                    if (userFinder.getText().isEmpty()) {
//                    	userFinder.setForeground(Color.GRAY);
//                    	userFinder.setText(" Edit User Using User ID ");
//                    }
//                }
//            });
//        
        searchPanel.add(userFinderLbl);
        searchPanel.add(userFinder);
        searchPanel.add(infoUF);
        infoUF.addActionListener(this);
        
        add(searchPanel, BorderLayout.NORTH);
        add(new JScrollPane(table));

        setVisible(true);
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
    	if(e.getSource()==infoUF) {
		try {
			editUser(userFinder.getText());
			
			
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	}
    }
    
    
    public void refreshTable() {
        // Clear the table
        model.setRowCount(0);

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
    }
    
	public void editUser(String userID) throws SQLException {
		EditUserGUI UserGUI = new EditUserGUI(userID);
		UserGUI.getFrame().addWindowListener(new WindowAdapter() {
            @Override
            public void windowClosed(WindowEvent e) {
                refreshTable();
            }
        });
 
}

      

//Remove this main method once testing is done
    public static void main(String[] args) throws SQLException {
        new UserTableGUI();
    }
}
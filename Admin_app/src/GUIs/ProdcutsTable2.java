package GUIs;

import javax.swing.JPanel;
import java.awt.Color;
import java.awt.SystemColor;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.ImageIcon;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.FlowLayout;
import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.Image;
import java.awt.CardLayout;
import javax.swing.JTable;
import javax.swing.JScrollPane;
import javax.swing.table.DefaultTableModel;

import Connection.DBproductAndCategory;

public class ProdcutsTable2 extends JPanel {
	private JTable mainTable;

	/**
	 * Create the panel.
	 */
	public ProdcutsTable2() {
		setLayout(null);
		
		JPanel panel = new JPanel();
		panel.setBounds(0, 0, 1487, 765);
		add(panel);
		panel.setLayout(null);
		
		JPanel navBar = new JPanel();
		navBar.setLayout(null);
		navBar.setForeground(SystemColor.menu);
		navBar.setBackground(new Color(184, 134, 11));
		navBar.setBounds(0, 0, 190, 765);
		panel.add(navBar);
		
		JLabel lblNewLabel_1 = new JLabel("Home Page");
		lblNewLabel_1.setFont(new Font("Segoe UI Variable", Font.BOLD, 15));
		lblNewLabel_1.setBounds(50, 151, 114, 43);
		navBar.add(lblNewLabel_1);
		
		JLabel lblUsers = new JLabel("Users");
		lblUsers.setFont(new Font("Segoe UI Variable", Font.BOLD, 15));
		lblUsers.setBounds(50, 215, 88, 45);
		navBar.add(lblUsers);
		
		JLabel lblProducts = new JLabel("Products");
		lblProducts.setFont(new Font("Segoe UI Variable", Font.BOLD, 15));
		lblProducts.setBounds(50, 288, 88, 45);
		navBar.add(lblProducts);
		
		JLabel lblOrders = new JLabel("Orders");
		lblOrders.setFont(new Font("Segoe UI Variable", Font.BOLD, 15));
		lblOrders.setBounds(50, 363, 88, 45);
		navBar.add(lblOrders);
		
		JLabel lblLogOut = new JLabel("Log Out");
		lblLogOut.setFont(new Font("Segoe UI Variable", Font.BOLD, 15));
		lblLogOut.setBounds(50, 549, 88, 45);
		navBar.add(lblLogOut);
		
		JPanel pageHeading = new JPanel();
		pageHeading.setLayout(null);
		pageHeading.setBackground(SystemColor.menu);
		pageHeading.setBounds(189, 0, 1298, 45);
		panel.add(pageHeading);
		
		JLabel lblProducts_1 = new JLabel("Products");
		lblProducts_1.setFont(new Font("Segoe UI Variable", Font.PLAIN, 24));
		lblProducts_1.setBounds(568, 10, 108, 25);
		pageHeading.add(lblProducts_1);
		
		JScrollPane scrollPane = new JScrollPane();
		scrollPane.setBounds(200, 55, 1277, 700);
		panel.add(scrollPane);
		
		mainTable = new JTable();
		DefaultTableModel model = new DefaultTableModel(new Object[][] {}, new String[] {
		    "Product Image", "Product ID", "Category ID", "Product Name", "Product Price", "Stock", "In/Out of/Low Stock", "Descripton"
		});
		mainTable.setModel(model);

		try {
		    DBproductAndCategory dba = new DBproductAndCategory();
		    ResultSet rs = dba.getProducts();
		    while (rs.next()) {
		        int productID = rs.getInt("Product_ID");
		        String imageFileName = productID + ".jpg";
		        String imagePath = "..\\GoldenRiver-Laravel\\public\\images\\allProductImages\\" + imageFileName;   
		        ImageIcon originalIcon = new ImageIcon(imagePath);
		        Image originalImage = originalIcon.getImage();
		        Image scaledImage = originalImage.getScaledInstance(120, 140, Image.SCALE_SMOOTH);
		        ImageIcon scaledIcon = new ImageIcon(scaledImage);
		        String amount = rs.getString("Amount");

		        model.addRow(new Object[] {
		            scaledIcon,
		            productID,
		            dba.getCategoryName(rs.getString("Category_ID")),
		            rs.getString("Product_Name"),
		            "\u00A3"+ rs.getString("Product_Price"),
		            amount,
		            amount.equals("0") ? "Out of Stock" : (Integer.parseInt(amount) < 4 ? "Low Stock" : "In Stock"),
		            rs.getString("Description")
		        });
		    }
		} catch (SQLException e) {
		    e.printStackTrace();
		}
	//	table = new JTable();
		try {
        	DBproductAndCategory dba = new DBproductAndCategory();
            ResultSet rs = dba.getProducts();
            while (rs.next()) {
            	 int productID = rs.getInt("Product_ID");
            	    String imageFileName = productID + ".jpg";
            	    String imagePath = "..\\GoldenRiver-Laravel\\public\\images\\allProductImages\\" + imageFileName;   
            	 // Load the original image from file
            	    ImageIcon originalIcon = new ImageIcon(imagePath);
            	    Image originalImage = originalIcon.getImage();
            	    Image scaledImage = originalImage.getScaledInstance(120, 140, Image.SCALE_SMOOTH);
            	    ImageIcon scaledIcon = new ImageIcon(scaledImage);
            	     
            	String amount = rs.getString("Amount");
		mainTable.setModel(new DefaultTableModel(          	
			new Object[][] {
				{scaledIcon,
            		productID,
                    dba.getCategoryName(rs.getString("Category_ID")),
                    rs.getString("Product_Name"),
                    "\u00A3"+ rs.getString("Product_Price"),
                    amount,
                    amount.equals("0") ? "Out of Stock" : (Integer.parseInt(amount) < 4 ? "Low Stock" : "In Stock"),
                    rs.getString("Description")},
			},
			new String[] {
				"Product Image", "Product ID", "Category ID", "Product Name", "Product Price", "Stock", "In/Out of/Low Stock", "Descripton"
			}
		) {
			/**
			 * 
			 */
			private static final long serialVersionUID = 1L;
			boolean[] columnEditables = new boolean[] {
				true, false, true, false, false, false, true, false
			};
			public boolean isCellEditable(int row, int column) {
				return columnEditables[column];
			}
		});
		
            } 
        }catch (SQLException e) {
            e.printStackTrace();
        }	
		mainTable.getColumnModel().getColumn(0).setPreferredWidth(87);
		mainTable.getColumnModel().getColumn(1).setPreferredWidth(61);
		mainTable.getColumnModel().getColumn(2).setPreferredWidth(66);
		mainTable.getColumnModel().getColumn(4).setPreferredWidth(71);
		mainTable.getColumnModel().getColumn(5).setPreferredWidth(43);
		mainTable.getColumnModel().getColumn(6).setPreferredWidth(84);
		mainTable.getColumnModel().getColumn(7).setPreferredWidth(164);
		scrollPane.setViewportView(mainTable);

	}
	
	public static void main(String[] args) {
		new ProdcutsTable2();
	}
}

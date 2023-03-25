package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

import Connection.DBproductAndCategory;


public class EditProductGUI implements ActionListener {
	private JFrame frame;
	private JPanel panel;
	private JButton EditPr_B;
	private JLabel Product_Name_L,Product_Price_L,Amount_L,Description_L,ID_L;
	private JTextField Product_Name_T,Product_Price_T,Amount_T,Description_T,ID_T;
	DBproductAndCategory DBPC;
	String ID;
	EditProductGUI(String ID) throws SQLException{
		this.ID=ID;
		
	frame=new JFrame();
	panel = new JPanel();
	
	panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
	panel.setLayout(new GridLayout(0,1));
	
    DBPC= new DBproductAndCategory();
	ResultSet rs = DBPC.findProduct(ID);
	//rs.next();
	
	ID_L = new JLabel("ID: "+ID);
	panel.add(ID_L);
	
	Product_Name_L = new JLabel("Name: "+rs.getString("Product_Name"));
	panel.add(Product_Name_L);
	
	Product_Name_T = new JTextField(30);
	panel.add(Product_Name_T);
	
	Product_Price_L = new JLabel("Price: "+rs.getString("Product_Price"));
	panel.add(Product_Price_L);
	
	Product_Price_T = new JTextField(30);
	panel.add(Product_Price_T);
	
	Amount_L = new JLabel("Amount: "+rs.getString("Amount"));
	panel.add(Amount_L);
	
	Amount_T = new JTextField(30);
	panel.add(Amount_T);
	
	Description_L = new JLabel("Description: "+rs.getString("Description"));
	panel.add(Description_L);
	
	Description_T = new JTextField(30);
	panel.add(Description_T);
	
	EditPr_B=new JButton("Edit product");
	panel.add(EditPr_B);
	EditPr_B.addActionListener(this);
	
	
	frame.add(panel,BorderLayout.CENTER);
	frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	frame.setTitle("Edit a Product");
	frame.pack();
	frame.setVisible(true);
}
	public static String removeLastChar(String s) {
	    return (s == null || s.length() == 0)
	      ? null 
	      : (s.substring(0, s.length() - 1));
	}
	@Override
	public void actionPerformed(ActionEvent e) {
	
		 if(e.getSource()==EditPr_B) {
			 String sql1="";
			
			if(!Product_Name_T.getText().equals("")) {
				sql1=sql1+"Product_Name="+"'"+Product_Name_T.getText()+"'"+",";
				}
			
			if(!Product_Price_T.getText().equals("")) {
				sql1=sql1+"Product_Price="+"'"+Product_Price_T.getText()+"'"+",";
			}
			
			if(!Amount_T.getText().equals("")) {
				sql1=sql1+"Amount="+"'"+Amount_T.getText()+"'"+",";	
			}
			
			if(!Description_T.getText().equals("")) {
				sql1=sql1+"Description="+"'"+Description_T.getText()+"'"+",";
			}
			if(sql1!="")
				try {
					DBPC.editProduct(removeLastChar(sql1),ID);
					
					JOptionPane.showMessageDialog(null,
			                "Has been updated!",
			                "Sys",
			                JOptionPane.INFORMATION_MESSAGE);
				
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
					JOptionPane.showMessageDialog(null,
			                e1,
			                "Sys",
			                JOptionPane.INFORMATION_MESSAGE);
				}
			frame.dispose();
		}
	}
}

package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.SQLException;

import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JList;
import javax.swing.JPanel;
import javax.swing.JTextField;

import Connection.DBproductAndCategory;

public class AddProductGUI implements ActionListener {
	private JFrame frame;
	private JPanel panel;
	private JButton addProduct;
	private JTextField Pr_Name,Pr_Dis,Amount,Description,Pr_p;
	 private JLabel Pr_Name_L,Pr_Dis_L,Amount_L,Description_L,categories_L,Pr_p_L;
	private JList categories;
	
	DBproductAndCategory DAC= new DBproductAndCategory();
	
	
	
	public AddProductGUI() throws SQLException {
		String week[] = DAC.MakeArrayOfCategories();
		
		
		frame=new JFrame();
		panel = new JPanel();
		
		Pr_Name_L = new JLabel("Product name:");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Pr_Name_L);
		
		Pr_Name = new JTextField(30);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(Pr_Name);
		
		
		Pr_p_L = new JLabel("Product price:");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Pr_p_L);
		
		Pr_p = new JTextField(30);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(Pr_p);
		
		
		Pr_Dis_L = new JLabel("Product discount:");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Pr_Dis_L);
		
		Pr_Dis = new JTextField(30);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(Pr_Dis);
		
		
		Amount_L = new JLabel("Product amount:");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Amount_L);
		
		Amount = new JTextField(30);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(Amount);
		
		
		Description_L = new JLabel("Product description:");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Description_L);
		
		Description = new JTextField(30);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(Description);
		
		
		categories_L = new JLabel("Product amount:");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(categories_L);
		
		
		categories= new JList(week);
		categories.setSelectedIndex(0);
		panel.add(categories);
		
		
		addProduct= new JButton("Add");
		//ChButton.setBounds(WIDTH-225,HEIGHT-100,SIZE,40);
		panel.add(addProduct);
		
		panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
		panel.setLayout(new GridLayout(0,1));
		
		frame.add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setTitle("Main menu");
		frame.pack();
		frame.setVisible(true);
		addProduct.addActionListener(this);
	}



	@Override
	public void actionPerformed(ActionEvent e) {
		if(e.getSource()==addProduct) {
			try {
				DAC.createProduct(categories.getSelectedValue().toString(), Pr_Name.getText(),Integer.parseInt(Pr_Dis.getText()) , Integer.parseInt(Pr_p.getText()), Integer.parseInt(Amount.getText()), Description.getText());
				
				frame.dispose();
			} catch (NumberFormatException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
		
	}
	
}

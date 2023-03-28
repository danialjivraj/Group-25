package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;

import javax.mail.MessagingException;
import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

import Connection.DBproductAndCategory;
import EmailSending.Report;
import EmailSending.Sender;
import java.awt.Color;

public class HomePageGUI implements ActionListener {
	
	private JFrame frame;
	private JPanel panel;
	private JButton createReport;
	private JButton infoUF,addProduct, allUsers, allProducts, allOrders;
	private JLabel statusOfReport,email_L;
	private JTextField productFinder;
	private String Email;
	
	public HomePageGUI(String Email) throws SQLException {
	frame=new JFrame();
	panel = new JPanel();
	panel.setBackground(new Color(255, 228, 181));
	
	this.Email=Email;
	email_L=new JLabel("Email: "+Email);
	panel.add(email_L);
	
	allUsers=new JButton("Users");
	panel.add(allUsers);
	allUsers.addActionListener(this);
	
	allProducts=new JButton("All Products");
	panel.add(allProducts);
	allProducts.addActionListener(this);
	
	allOrders=new JButton("All Orders");
	panel.add(allOrders);
	allOrders.addActionListener(this);
	
	addProduct=new JButton("Add product");
	panel.add(addProduct);
	addProduct.addActionListener(this);
	
	infoUF=new JButton("Find/Edit product");
	panel.add(infoUF);
	infoUF.addActionListener(this);
	
	productFinder = new JTextField(30);
	//loginTx.setBounds(WIDTH/2,70,100,25);
	panel.add(productFinder);
	

    statusOfReport=new JLabel("Click it to Generate a report:");
    
	createReport= new JButton("Generate Report");
	createReport.addActionListener(this);
	

	
	panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
	panel.setLayout(new GridLayout(0,1));
	panel.add(statusOfReport);
	panel.add(createReport);
	
	
	frame.getContentPane().add(panel,BorderLayout.CENTER);
	frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	frame.setTitle("Main menu");
	frame.pack();
	frame.setVisible(true);
	frame.setResizable(false);
	
	StockAlertGUI sAlert = new StockAlertGUI();
	sAlert.displayStockAlerts();
}
	
@Override
public void actionPerformed(ActionEvent e) {
	// TODO Auto-generated method stu
	if(e.getSource()==createReport) {
		Report rep=new Report(); 
		try {
			String report=rep.makeReport();
			Sender sender=new Sender(Email,report);
			statusOfReport.setText("The report has been sent, check your email.");
			new ReportGUI("<html>"+report+"</html>");
		} catch (MessagingException | IOException | SQLException e1) {
			e1.printStackTrace();
			statusOfReport.setText("The report has not been sent!(Error: "+e1+")");
		}
	}
	else if(e.getSource()==addProduct) {
		try {
			new AddProductGUI();
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	}else if(e.getSource()==allUsers) {
		try{
			new UserTableGUI();
		}catch (SQLException e1) {
			e1.printStackTrace();
		}
	}else if(e.getSource()==allProducts) {
		try{
			new ProductsTableGUI();
		}catch (SQLException e1) {
			e1.printStackTrace();
		}
	}else if(e.getSource()==allOrders) {
		try{
			new OrderGUI();
		}catch (SQLException e1) {
			e1.printStackTrace();
		}
	}else if(e.getSource()==infoUF) {
		try {
			new EditProductGUI(productFinder.getText());
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	}
	
}


}

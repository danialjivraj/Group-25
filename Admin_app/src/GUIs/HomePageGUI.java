package GUIs;

import java.awt.Color;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import Connection.DBorder;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.Image;



import java.io.IOException;
import java.sql.SQLException;


import javax.mail.MessagingException;

import EmailSending.Report;
import EmailSending.Sender;


public class HomePageGUI extends JFrame implements ActionListener{

	private JPanel contentPane;
	private final JPanel panel = new JPanel();
	
	private JButton createReport;
	private JButton allUsers, allProducts, allOrders;
	private JLabel statusOfReport;
	private String Email;
	private JLabel email_L;
	private JPanel graphPanel;
	private ChartPanel1 chartPanel;
	private ChartPanel2 chartPanel2;
	private JPanel graphPanel2;
	/**
	 * Launch the application.
	 */

	/**
	 * Create the frame.
	 */
	public HomePageGUI(String Email) throws SQLException{
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(400, 150, 1522, 633);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setResizable(false);
		setIconImage(ImageIconMaker.createImageIcon());
		setTitle("Home Page");
		
		setContentPane(contentPane);
		contentPane.setLayout(null);
		panel.setBounds(0, 0, 1508, 603);
		contentPane.add(panel);
		panel.setLayout(null);
		Color backgroundColor = Color.decode("#ffe4b5");
		panel.setBackground(backgroundColor);
		
		allUsers = new JButton("Users");
		allUsers.setBackground(Color.WHITE);
		allUsers.setFont(new Font("Tahoma", Font.PLAIN, 14));
		allUsers.setBounds(167, 231, 148, 47);
		panel.add(allUsers);
		allUsers.addActionListener(this);
		
		 allProducts = new JButton("Products");
		 allProducts.setBackground(Color.WHITE);
		 allProducts.setFont(new Font("Tahoma", Font.PLAIN, 14));
		allProducts.setBounds(167, 309, 148, 47);
		panel.add(allProducts);
		allProducts.addActionListener(this);
		
		allOrders = new JButton("Orders");
		allOrders.setBackground(Color.WHITE);
		allOrders.setFont(new Font("Tahoma", Font.PLAIN, 14));
		allOrders.setBounds(167, 387, 148, 47);
		panel.add(allOrders);
		allOrders.addActionListener(this);
		
		createReport = new JButton("Generate Report");
		createReport.setBackground(new Color(245, 245, 220));
		createReport.setFont(new Font("Tahoma", Font.PLAIN, 14));
		createReport.setBounds(140, 493, 224, 43);
		panel.add(createReport);
		createReport.addActionListener(this);
		
		JLabel pgHeading = new JLabel("Home Page");
		pgHeading.setFont(new Font("Segoe UI Variable", Font.BOLD, 26));
		pgHeading.setBounds(682, 50, 193, 43);
		panel.add(pgHeading);
		
		ImageIcon icon = new ImageIcon(LoginPage.class.getResource("/Logo/logo.png"));
		Image scaledImage = icon.getImage().getScaledInstance(140, 140, Image.SCALE_SMOOTH);
		ImageIcon scaledIcon = new ImageIcon(scaledImage);
		JLabel imgLabel = new JLabel(scaledIcon);
		imgLabel.setBounds(36, 10, 120, 117);
		panel.add(imgLabel);
		
		statusOfReport = new JLabel("Generate A Report:");
		statusOfReport.setFont(new Font("Segoe UI", Font.PLAIN, 15));
		statusOfReport.setBounds(167, 464, 275, 19);
		panel.add(statusOfReport);
		
		this.Email=Email;
		email_L = new JLabel("Email: "+Email);
		email_L.setFont(new Font("Segoe UI", Font.PLAIN, 14));
		email_L.setBounds(1269, 26, 257, 36);
		panel.add(email_L);
		
		JLabel graphLabel = new JLabel("Weekly Sales Graphs");
		graphLabel.setFont(new Font("Segoe UI", Font.BOLD, 21));
		graphLabel.setBounds(831, 166, 214, 36);
		panel.add(graphLabel);
		
		   // create a new instance of the ChartPanel class
        chartPanel = new ChartPanel1();
		graphPanel = new JPanel();
		graphPanel.setBackground(Color.WHITE);
		graphPanel.setBounds(458, 243, 510, 310);
		panel.add(graphPanel);
		graphPanel.add(chartPanel);
		  // update the dataset with the data retrieved from the database
        DBorder db = new DBorder();
        db.getOrdersInAWeek(chartPanel);
        
        chartPanel2 = new ChartPanel2();
        graphPanel2 = new JPanel();
        graphPanel2.setBackground(Color.WHITE);
        graphPanel2.setBounds(978, 243, 507, 310);
        panel.add(graphPanel2);
        graphPanel2.add(chartPanel2);
        db.getOrderStatusDistributionInAWeek(chartPanel2);
        
        JLabel pagesLbl = new JLabel("Options");
        pagesLbl.setFont(new Font("Segoe UI", Font.BOLD, 21));
        pagesLbl.setBounds(194, 166, 82, 36);
        panel.add(pagesLbl);
        
		setVisible(true);
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
//		else if(e.getSource()==addProduct) {
//			try {
//				new AddProductGUI();
//			} catch (SQLException e1) {
//				// TODO Auto-generated catch block
//				e1.printStackTrace();
//			}
//		}
		else if(e.getSource()==allUsers) {
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
		}
//		else if(e.getSource()==infoUF) {
//			try {
//				new EditProductGUI(productFinder.getText());
//			} catch (SQLException e1) {
//				e1.printStackTrace();
//			}
//		}
		
	}
}

package GUIs;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.Image;
import javax.swing.SwingConstants;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;

import javax.mail.MessagingException;
import javax.swing.BorderFactory;
import javax.swing.ImageIcon;
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
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;

public class HomePageGUI extends JFrame implements ActionListener{

	private JPanel contentPane;
	private final JPanel panel = new JPanel();
	
	private JButton createReport;
	private JButton allUsers, allProducts, allOrders;
	private JLabel statusOfReport;
	private String Email;
	private JLabel email_L;
	/**
	 * Launch the application.
	 */
//	public static void main(String[] args) {
//		EventQueue.invokeLater(new Runnable() {
//			public void run() {
//				try {
//					homePageGUI2 frame = new homePageGUI2("test");
//					frame.setVisible(true);
//				} catch (Exception e) {
//					e.printStackTrace();
//				}
//			}
//		});
//	}

	/**
	 * Create the frame.
	 */
	public HomePageGUI(String Email) throws SQLException{
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 690, 600);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		contentPane.setLayout(null);
		panel.setBounds(0, 0, 676, 563);
		contentPane.add(panel);
		panel.setLayout(null);
		Color backgroundColor = Color.decode("#ffe4b5");
		panel.setBackground(backgroundColor);
		
		allUsers = new JButton("Users");
		allUsers.setFont(new Font("Tahoma", Font.PLAIN, 14));
		allUsers.setBounds(257, 175, 148, 47);
		panel.add(allUsers);
		allUsers.addActionListener(this);
		
		 allProducts = new JButton("Products");
		 allProducts.setFont(new Font("Tahoma", Font.PLAIN, 14));
		allProducts.setBounds(257, 243, 148, 47);
		panel.add(allProducts);
		allProducts.addActionListener(this);
		
		allOrders = new JButton("Orders");
		allOrders.setFont(new Font("Tahoma", Font.PLAIN, 14));
		allOrders.setBounds(257, 314, 148, 47);
		panel.add(allOrders);
		allOrders.addActionListener(this);
		
		createReport = new JButton("Generate Report");
		createReport.setFont(new Font("Tahoma", Font.PLAIN, 14));
		createReport.setBounds(222, 427, 224, 43);
		panel.add(createReport);
		createReport.addActionListener(this);
		
		JLabel pgHeading = new JLabel("HomePage");
		pgHeading.setFont(new Font("Tahoma", Font.BOLD, 22));
		pgHeading.setBounds(274, 66, 148, 35);
		panel.add(pgHeading);
		
		ImageIcon icon = new ImageIcon(LoginPage.class.getResource("/Logo/logo.png"));
		Image scaledImage = icon.getImage().getScaledInstance(100, 100, Image.SCALE_SMOOTH);
		ImageIcon scaledIcon = new ImageIcon(scaledImage);
		JLabel imgLabel = new JLabel(scaledIcon);
		imgLabel.setBounds(61, 22, 107, 81);
		panel.add(imgLabel);
		
		statusOfReport = new JLabel("Generate A Report:");
		statusOfReport.setFont(new Font("Tahoma", Font.PLAIN, 15));
		statusOfReport.setBounds(257, 398, 179, 19);
		panel.add(statusOfReport);
		
		this.Email=Email;
		email_L = new JLabel("Email: "+Email);
		email_L.setFont(new Font("Tahoma", Font.PLAIN, 16));
		email_L.setBounds(492, 22, 174, 19);
		panel.add(email_L);
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

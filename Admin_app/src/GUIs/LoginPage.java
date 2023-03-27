package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.HeadlessException;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.SQLException;

import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

import Connection.DBaccount;
import java.awt.Color;
import javax.swing.ImageIcon;
import javax.swing.SwingConstants;
import javax.swing.BoxLayout;
import java.awt.FlowLayout;

public class LoginPage  implements ActionListener {
	private JFrame frame;
	private JPanel panel;
	private JTextField loginTx,passTx;
	 private JLabel labelInfo1Login,labelInfo2Password;
	 private JButton ChButton;
	 private JLabel lblNewLabel;

	 //variables
	public LoginPage() {
		frame=new JFrame();
		panel = new JPanel();
		panel.setBackground(new Color(255, 228, 181));
		
		panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
		panel.setLayout(new FlowLayout(FlowLayout.CENTER, 5, 5));
		
		lblNewLabel = new JLabel("");
		lblNewLabel.setIcon(new ImageIcon(LoginPage.class.getResource("/Logo/logo.png")));
		panel.add(lblNewLabel);
		ImageIcon originalIcon = new ImageIcon("C:\\Group25\\Group-25\\GoldenRiver-Laravel\\public\\images\\logo.png");
		Image originalImage = originalIcon.getImage();
		Image scaledImage = originalImage.getScaledInstance(100, 200, Image.SCALE_SMOOTH);
		ImageIcon scaledIcon = new ImageIcon(scaledImage);
		lblNewLabel.setIcon(scaledIcon);
		

		labelInfo1Login = new JLabel("Login :");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(labelInfo1Login);
		
		loginTx = new JTextField(15);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(loginTx);
		
		labelInfo2Password = new JLabel("Password :");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(labelInfo2Password);
		
		passTx = new JPasswordField(15);
		//passTx.setBounds(WIDTH/2,70+GAP,100,25);
		panel.add(passTx);
		
		ChButton= new JButton("Log in");
		//ChButton.setBounds(WIDTH-225,HEIGHT-100,SIZE,40);
		panel.add(ChButton);
		
				
		frame.getContentPane().add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setTitle("Login page");
		frame.pack();
		frame.setVisible(true);
		
		ChButton.addActionListener(this);
	}


	@Override
	public void actionPerformed(ActionEvent e) {
		// TODO Auto-generated method stub
		
		if (e.getSource().equals(ChButton)) {
			DBaccount acc=new DBaccount();
			try {
				if(acc.login(loginTx.getText(),passTx.getText())==true) {
					JOptionPane.showMessageDialog(null,
				            "Logged in!",
				            "Sys",
				            JOptionPane.INFORMATION_MESSAGE);
					
					new ProductsManipulator(loginTx.getText());
					frame.dispose();
				}
				else {
					JOptionPane.showMessageDialog(null,
			                "Wrong input",
			                "Sys",
			                JOptionPane.INFORMATION_MESSAGE);
				}
			} catch (HeadlessException | SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
		
	}
	
}

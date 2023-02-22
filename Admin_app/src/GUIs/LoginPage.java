package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BorderFactory;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class LoginPage  implements ActionListener {
	private JFrame frame;
	private JPanel panel;
	private JTextField loginTx,passTx;
	 private JLabel labelInfo1Login,labelInfo2Password;
	 //variables
	public LoginPage() {
		frame=new JFrame();
		panel = new JPanel();
		
		panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
		panel.setLayout(new GridLayout(0,1));

		labelInfo1Login = new JLabel("Login :");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(labelInfo1Login);
		
		loginTx = new JTextField(30);
		//loginTx.setBounds(WIDTH/2,70,100,25);
		panel.add(loginTx);
		
		labelInfo2Password = new JLabel("Password :");
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(labelInfo2Password);
		
		passTx = new JTextField(30);
		//passTx.setBounds(WIDTH/2,70+GAP,100,25);
		panel.add(passTx);
				
		frame.add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setTitle("Products panel");
		frame.pack();
		frame.setVisible(true);
	}


	@Override
	public void actionPerformed(ActionEvent e) {
		// TODO Auto-generated method stub
		
	}
	
}

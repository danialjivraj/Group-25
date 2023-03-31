package GUIs;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

import Connection.DBaccount;
import java.awt.Color;
import javax.swing.border.EmptyBorder;
import java.awt.Component;
import javax.swing.Box;
import java.awt.Dimension;

public class EditUserGUI implements ActionListener {
	private JFrame frame;

	private JPanel panel;
	private JButton EditUs_B;
	private String ID;
	private JLabel ID_L, name_L,ENAIL_l,Phone_Number_L,User_Surname_L,User_Sex_L,User_DOB,User_Status_L;
	private DBaccount DBA;
	String[] Statuses= {"Customer","Admin"};
	private JComboBox Status;
	private Component rigidArea;
	private Component rigidArea_1;
	private Component rigidArea_2;
	private Component rigidArea_3;
	private Component rigidArea_4;
	private Component rigidArea_5;
	private Component rigidArea_6;
	private Component rigidArea_7;
	EditUserGUI(String ID) throws SQLException{
		
		this.ID=ID;
		DBA=new DBaccount();
		ResultSet rs = DBA.getUser(ID);
		
		frame=new JFrame();
		frame.setIconImage(ImageIconMaker.createImageIcon());
		frame.setBounds(900, 400, 1400, 600);
		panel = new JPanel();
		panel.setBorder(new EmptyBorder(10, 10, 10, 10));
		panel.setLayout(new BoxLayout(panel, BoxLayout.Y_AXIS));
		panel.setBackground(new Color(255, 228, 181));

		ID_L=new JLabel("User ID: "+ID);
		panel.add(ID_L);
		
		rigidArea_1 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_1);

		name_L=new JLabel("Name: "+rs.getString("name"));
		panel.add(name_L);
		
		rigidArea_2 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_2);

		ENAIL_l=new JLabel("Email: "+rs.getString("email"));
		panel.add(ENAIL_l);
		
		rigidArea_3 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_3);

		Phone_Number_L=new JLabel("Phone number: "+rs.getString("Phone_Number"));
		panel.add(Phone_Number_L);
		
		rigidArea_4 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_4);

		User_Surname_L=new JLabel("Surname: "+rs.getString("User_Surname"));
		panel.add(User_Surname_L);
		
		rigidArea_5 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_5);

		User_Sex_L=new JLabel("Sex: "+rs.getString("User_Sex"));
		panel.add(User_Sex_L);
		
		rigidArea_6 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_6);

		User_DOB=new JLabel("DOB: "+rs.getString("User_DOB"));
		panel.add(User_DOB);
		
		rigidArea_7 = Box.createRigidArea(new Dimension(0, 2));
		panel.add(rigidArea_7);

		User_Status_L=new JLabel("Status: "+rs.getString("User_Status"));
		panel.add(User_Status_L);

		Status = new JComboBox(Statuses);
		Status.setAlignmentX(0.0f);

		int s;
		if(rs.getString("User_Status").equals("Customer")) {s=0;}else {s=1;}

		Status.setSelectedIndex(s);
		panel.add(Status);
		
		rigidArea = Box.createRigidArea(new Dimension(0, 5));
		panel.add(rigidArea);

		EditUs_B=new JButton("Edit status");
		panel.add(EditUs_B);
		EditUs_B.addActionListener(this);

		frame.getContentPane().add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		frame.setTitle("Edit user");
		frame.pack();
		frame.setVisible(true);
		frame.setResizable(false);
	}
	
	public JFrame getFrame() {
		return frame;
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		if(e.getSource()==EditUs_B) {
			try {
				DBA.changeStatusTo(ID,Status.getSelectedItem().toString());
				frame.dispose();
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
		
	}
	
	
}

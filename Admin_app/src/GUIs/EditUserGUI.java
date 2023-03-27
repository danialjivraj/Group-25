package GUIs;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

import Connection.DBaccount;

public class EditUserGUI implements ActionListener {
	private JFrame frame;
	private JPanel panel;
	private JButton EditUs_B;
	private String ID;
	private JLabel ID_L, name_L,ENAIL_l,Phone_Number_L,User_Surname_L,User_Sex_L,User_DOB,User_Status_L;
	private DBaccount DBA;
	String[] Statuses= {"Customer","Admin"};
	private JComboBox Status;
	EditUserGUI(String ID) throws SQLException{
		
		this.ID=ID;
		DBA=new DBaccount();
		ResultSet rs = DBA.getUser(ID);
		
		frame=new JFrame();
		panel = new JPanel();
		
		ID_L=new JLabel("User ID: "+ID);
		panel.add(ID_L);
		
		name_L=new JLabel("Name: "+rs.getString("name"));
		panel.add(name_L);
		
		ENAIL_l=new JLabel("Email: "+rs.getString("email"));
		panel.add(ENAIL_l);
		
		Phone_Number_L=new JLabel("Phone number: "+rs.getString("Phone_Number"));
		panel.add(Phone_Number_L);
		
		User_Surname_L=new JLabel("Surname: "+rs.getString("User_Surname"));
		panel.add(User_Surname_L);
		
		User_Sex_L=new JLabel("Sex: "+rs.getString("User_Sex"));
		panel.add(User_Sex_L);
		
		User_DOB=new JLabel("DOB: "+rs.getString("User_DOB"));
		panel.add(User_DOB);
		
		User_Status_L=new JLabel("Status: "+rs.getString("User_Status"));
		panel.add(User_Status_L);
		
		Status = new JComboBox(Statuses);
		
		int s;
		if(rs.getString("User_Status").equals("Customer")) {s=0;}else {s=1;}
		
		Status.setSelectedIndex(s);
		panel.add(Status);
		
		EditUs_B=new JButton("Edit status");
		panel.add(EditUs_B);
		EditUs_B.addActionListener(this);
		
		frame.add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		frame.setTitle("Edit user");
		frame.pack();
		frame.setVisible(true);
		frame.setResizable(false);
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		if(e.getSource()==EditUs_B) {
			try {
				DBA.changeStatusTo(ID,Status.getSelectedItem().toString());
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
		
	}
}

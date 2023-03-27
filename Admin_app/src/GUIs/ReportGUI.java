package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;

import javax.swing.BorderFactory;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;
import java.awt.Color;

public class ReportGUI {
	
	private JFrame frame;
	private JPanel panel;
	private JLabel Report_L;
	public ReportGUI(String ReportStr){
		
		frame=new JFrame();
		panel = new JPanel();
		panel.setBackground(new Color(255, 228, 181));
		
		panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
		panel.setLayout(new GridLayout(0,1));
		
		Report_L = new JLabel(ReportStr);
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Report_L);
		
		
		frame.getContentPane().add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		frame.setTitle("Report");
		frame.pack();
		frame.setVisible(true);
	}
}

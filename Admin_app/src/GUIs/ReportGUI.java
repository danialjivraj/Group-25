package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;

import javax.swing.BorderFactory;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ReportGUI {
	
	private JFrame frame;
	private JPanel panel;
	private JLabel Report_L;
	public ReportGUI(String ReportStr){
		
		frame=new JFrame();
		panel = new JPanel();
		
		panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
		panel.setLayout(new GridLayout(0,1));
		
		Report_L = new JLabel(ReportStr);
		 //labelInfo2.setBounds(20,70+GAP,100,25);
		panel.add(Report_L);
		
		
		frame.add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setTitle("Report");
		frame.pack();
		frame.setVisible(true);
	}
}

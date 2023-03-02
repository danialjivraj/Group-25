package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;

import javax.swing.BorderFactory;
import javax.swing.JFrame;
import javax.swing.JPanel;

public class AddProductGUI {
	private JFrame frame;
	private JPanel panel;
	
	public AddProductGUI() {
		frame=new JFrame();
		panel = new JPanel();
		
		panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
		panel.setLayout(new GridLayout(0,1));
		
		frame.add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setTitle("Main menu");
		frame.pack();
		frame.setVisible(true);
	
	}
	
}

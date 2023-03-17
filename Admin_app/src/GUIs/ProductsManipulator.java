package GUIs;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.sql.SQLException;

import javax.mail.MessagingException;
import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

import EmailSending.Report;
import EmailSending.Sender;

public class ProductsManipulator implements ActionListener {
	
	private JFrame frame;
	private JPanel panel;
	private JButton createReport;
	private JButton infoPF,infoUF,addProduct;
	private JLabel statusOfReport;
	private JTextField productFinder,userFinder;
	
public ProductsManipulator() {
	frame=new JFrame();
	panel = new JPanel();
	
	infoUF=new JButton("Find product");
	panel.add(infoUF);
	infoUF.addActionListener(this);
	
	addProduct=new JButton("Add product");
	panel.add(addProduct);
	addProduct.addActionListener(this);
	
	productFinder = new JTextField(30);
	//loginTx.setBounds(WIDTH/2,70,100,25);
	panel.add(productFinder);
	
	infoPF=new JButton("Find user");
	panel.add(infoPF);
	infoPF.addActionListener(this);
	
	userFinder = new JTextField(30);
	//loginTx.setBounds(WIDTH/2,70,100,25);
	panel.add(userFinder);
	
    statusOfReport=new JLabel("Click it to Generate a report:");
    
	createReport= new JButton("Generate Report");
	createReport.addActionListener(this);
	

	
	panel.setBorder(BorderFactory.createEmptyBorder(30,30,10,30));
	panel.setLayout(new GridLayout(0,1));
	panel.add(statusOfReport);
	panel.add(createReport);
	
	
	frame.add(panel,BorderLayout.CENTER);
	frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	frame.setTitle("Main menu");
	frame.pack();
	frame.setVisible(true);
}

@Override
public void actionPerformed(ActionEvent e) {
	// TODO Auto-generated method stu
	if(e.getSource()==createReport) {
		Report rep=new Report(); 
		try {
			String report=rep.makeReport();
			Sender sender=new Sender("titantop1tap@gmail.com",report);
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
	}
	else if(e.getSource()==infoUF) {
		try {
			new EditProductGUI(productFinder.getText());
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	}
	
	
	
	
	
	
	
}


}

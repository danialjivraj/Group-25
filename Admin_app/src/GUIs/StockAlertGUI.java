package GUIs;

import java.util.HashMap;
import java.util.Map;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import java.awt.Color;


public class StockAlertGUI extends JFrame{
	    private JLabel stockLabel;

	    public StockAlertGUI() {
	    	getContentPane().setBackground(new Color(255, 228, 181));
	        stockLabel = new JLabel("Stock: 0");
	        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
	        setSize(300, 100);        
	    }

	    public void displayStockAlerts(HashMap<String,Integer> endingProducts) {
	        for (Map.Entry<String,Integer> entry : endingProducts.entrySet()) {
	            String productId = entry.getKey();
	            int stockAmount = entry.getValue();
	            if (stockAmount == 0) {
	                JOptionPane.showMessageDialog(stockLabel, this, "Product with ID " + productId + " is out of stock!", stockAmount);
	            } else {
	                JOptionPane.showMessageDialog(stockLabel, this, "Product with ID " + productId + " has only " + stockAmount + " items left in stock.", stockAmount);
	            }
	        }
	    }
	   
	    public void setVisible(boolean visible) {
	        super.setVisible(visible);
	    }
//public static void main(String[] args) {
//	StockAlertGUI st = new StockAlertGUI();
//	st.setVisible(true);
//}
}

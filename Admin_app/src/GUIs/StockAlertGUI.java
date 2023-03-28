package GUIs;

import java.util.HashMap;
import java.util.Map;
import Connection.DBproductAndCategory;

import javax.swing.ImageIcon;
import javax.swing.JFrame;

import javax.swing.JOptionPane;

import java.awt.Image;
import java.sql.SQLException;


public class StockAlertGUI{

	JFrame frame;
	
	//alerts if some items are out of stock or low in stock.
	 public void displayStockAlerts() throws SQLException   {
	        // Call listOfEndingProducts() method to get the ending products
	        HashMap<String,Integer> endingProducts = new DBproductAndCategory().listOfEndingProducts();

	        // Create separate hashmaps for out of stock and low stock products
	        HashMap<String,Integer> outOfStockProducts = new HashMap<>();
	        HashMap<String,Integer> lowStockProducts = new HashMap<>();

	        for (Map.Entry<String,Integer> entry : endingProducts.entrySet()) {
	            String productId = entry.getKey();
	            int stockAmount = entry.getValue();
	            if (stockAmount == 0) {
	                outOfStockProducts.put(productId, stockAmount);
	            } else if (stockAmount <= 5) { // Change this later if any problems caused
	                lowStockProducts.put(productId, stockAmount);
	            }
	        }
	        
            
	        // Display separate alerts for out of stock and low stock products
	        if (!outOfStockProducts.isEmpty()) {
	            String outOfStockMessage = "The following products are out of stock:\n";
	            for (Map.Entry<String,Integer> entry : outOfStockProducts.entrySet()) {
	                outOfStockMessage += "Product ID " + entry.getKey() + "\n";
	            }
	            
	            JOptionPane.showMessageDialog(frame, outOfStockMessage, "Out of Stock Products", JOptionPane.WARNING_MESSAGE, getImgIcon());
	        }

	        if (!lowStockProducts.isEmpty()) {
	            String lowStockMessage = "The following products are low on stock:\n";
	            for (Map.Entry<String,Integer> entry : lowStockProducts.entrySet()) {
	                lowStockMessage += "Product ID " + entry.getKey() + " only has " + entry.getValue() + " items left in stock.\n";
	            }
	            JOptionPane.showMessageDialog(frame, lowStockMessage, "Low Stock Products", JOptionPane.WARNING_MESSAGE, getImgIcon());
	        }
	    }
	 
	 //alert if there are Everything in stock
	 public void allInStckAlert() throws SQLException {
	        HashMap<String,Integer> endingProducts = new DBproductAndCategory().listOfEndingProducts();
		 if (endingProducts.isEmpty()) {
        JOptionPane.showMessageDialog(frame, "All Items Are In Stock", "Stocks", JOptionPane.WARNING_MESSAGE, getImgIcon());

	 }
	 }
		 
	public ImageIcon getImgIcon() {
		ImageIcon icon = new ImageIcon("Image_Icon/Favicon.jpg");
        Image image = icon.getImage().getScaledInstance(50, 50, Image.SCALE_SMOOTH); // set the desired dimensions (50x50)
        ImageIcon resizedIcon = new ImageIcon(image);
		return resizedIcon;
	}
	 }


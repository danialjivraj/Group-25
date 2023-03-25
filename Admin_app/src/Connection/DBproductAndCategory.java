package Connection;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import GUIs.StockAlertGUI;

public class DBproductAndCategory extends DataBaseConn{
	public boolean editProduct(String sqlInfo,String ID) throws SQLException {
		String sql= "UPDATE product "
				+ "SET "+sqlInfo+" "
				+ "WHERE Product_ID="+ID+";";
		System.out.println(sql);
		getStmt().executeUpdate(sql);
		return true;
	}
	public ResultSet findProduct(String ID) throws SQLException {
		String sql="SELECT * FROM product WHERE Product_ID ='"+ID+"'";
		ResultSet rs = getStmt().executeQuery(sql);
		if(!rs.next()) {
			System.out.println("Error");
		}else {System.out.println("True");}
		return rs;
	}
	
	String textToIDCat(String nameCat) throws SQLException {
		String sql="SELECT * FROM category WHERE Category_Name='"+nameCat+"'";
		ResultSet rs = getStmt().executeQuery(sql);
		rs.next();
		//int count = rs.getInt("recordCount");
		//if(count!=1) {throw new IllegalStateException("Unknown parameter for Category");}
		
		return rs.getString("Category_ID");
		//return "5";
	}
	public void createProduct(String Category_ID,String Product_Name,int Product_Discount,
			int Product_Price,int Amount,String Description) throws SQLException  {
		
		//Used to create product
		
		String sql="INSERT INTO product (Category_ID,Product_Name,Product_Discount,Product_Price,Amount,Description	) "
				+ "VALUES ('"+textToIDCat(Category_ID)+"','"+Product_Name+"','"+Product_Discount+"','"+Product_Price+"','"+Amount+"','"+Description+"');";
		
		getStmt().executeUpdate(sql);	
		
		System.out.println("Creation of product was successful..");
		
		//Image is missing!!!!!
		
	}
	
	
	public void createCategory( String Category_Name) throws SQLException  {
		
		//Used to create category
		
		String sql="INSERT INTO category (Category_Name) "
				+ "VALUES ('"+Category_Name+"');";
		
		getStmt().executeUpdate(sql);	
		
		System.out.println("Creation of product was successful..");
		
		//Image is missing!!!!!
		
	}
	

	public HashMap<String,Integer> listOfEndingProducts() throws SQLException{
		
		//Used to make a Hashmap with low stock (stock is low if < 3)
		
		HashMap<String,Integer> records=new HashMap<>();
		String sql="SELECT * FROM product WHERE Amount<4";
		
		
		ResultSet rs = getStmt().executeQuery(sql);
		 while (rs.next()) {
			String IDofProduct=rs.getString("Product_ID");
			Integer amountOfProduct=rs.getInt("Amount");;
			
			 records.put(IDofProduct, amountOfProduct);	 
		 }
		return records;
		
	}
	public HashMap<String,String> listOfProcessingOrders() throws SQLException{
		
		//Used to make a Hashmap of Processing (status of order) orders
		
		HashMap<String,String> records=new HashMap<>();
		String sql="SELECT * FROM orderb WHERE Order_Status='Processing'";
		
		
		ResultSet rs = getStmt().executeQuery(sql);
		 while (rs.next()) {
			String IDofOrder=rs.getString("Order_ID");
			String IDofUser=rs.getString("Account_ID");;
			
			 records.put(IDofOrder, IDofUser);	 
		 }
		return records;
		
	}
	
	public String[] MakeArrayOfCategories() throws SQLException {
		ArrayList<String> records=new ArrayList<>();
		String sql="SELECT * FROM category";
		ResultSet rs = getStmt().executeQuery(sql);
		 while (rs.next()) {
			
			String NameofCat=rs.getString("Category_Name");
			
			 records.add(NameofCat);
		 }
		String[] result= new String[records.size()];
		result=(String[]) records.toArray(result);
		return result;
	}
	
	
	//added by Faraz - For stock Level Alert
	public void checkStockLevels() throws SQLException {
	    HashMap<String,Integer> endingProducts = listOfEndingProducts();
	    if (!endingProducts.isEmpty()) {
	        StockAlertGUI stockAlert = new StockAlertGUI();
	        stockAlert.displayStockAlerts(endingProducts);
	        stockAlert.setVisible(true);
	    }
	}
	public ResultSet getProducts() throws SQLException{
		   String sql = "SELECT * FROM product;";
		    ResultSet rs = getStmt().executeQuery(sql);
		    return rs;
	}
	
	public String getCategoryName(String categoryId) {
	    switch (categoryId) {
	        case "5":
	            return "Earrings";
	        case "6":
	            return "Necklace";
	        case "7":
	            return "Bracelets";
	        case "8":
	            return "Rings";
	        case "9":
	            return "Exclusive sets";
	        default:
	            return "Unknown category";
	    }
	}

}

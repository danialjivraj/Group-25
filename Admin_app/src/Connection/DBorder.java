package Connection;

import java.sql.SQLException;

import java.sql.ResultSet;


public class DBorder extends DataBaseConn{
	
	public void changeStatusOfOrder(String ID, int Status) throws SQLException {
		// used to change status of the order 
		//requires id of order and
		//new status as an int (statusMaker)=> String
		
		String StatusSQL= statusMaker(Status);
		
		String sql= "UPDATE orderb "
				+ "SET Order_Status = '"+StatusSQL+"' "
				+ "WHERE Order_ID="+ID+";";
		
		getStmt().executeUpdate(sql);
		
		System.out.println("Change of status for order was successful..");
		
	}

	
	//Uses an int as status
	public String statusMaker(int Status) {
		
		//Used to set a status
		// 1 - Processing
		// 2 - Shipped
		// 3 - Delivered
		// 4 - Canceled
		
		String StatusSQL;
		
		switch(Status) {
		case 1:
			StatusSQL="Processing";
			break;
		case 2:
			StatusSQL="Shipped";
			break;
		case 3:
			StatusSQL="Delivered";
			break;
		case 4:
			StatusSQL="Canceled";
			break;
		default:
			throw new IllegalStateException("Unknown parameter for Status (1 for Processing or "
					+ "2 for Shipped or 3 for Delivered or 4 Canceled)");
		}
		
		return StatusSQL;
		
	}
	
	
	//Uses a String as status
	public int getStatus(String status) {
	    switch (status) {
	        case "Processing":
	            return 1;
	        case "Shipped":
	            return 2;
	        case "Delivered":
	            return 3;
	        case "Canceled":
	            return 4;
	        default:
	            throw new IllegalArgumentException("Invalid status: " + status);
	    }
	}

	
	public ResultSet getAllOrders() throws SQLException {
		String sql = "SELECT * FROM orderb WHERE Order_Status <> 'Basket'";
	    ResultSet rs = getStmt().executeQuery(sql);
	    return rs;
	}
	
	public String getOrderProductById(String ID) throws SQLException {
	  String sql = "SELECT * FROM linked_product_order WHERE Order_ID='"+ID+"'";
	  ResultSet rs = getStmt().executeQuery(sql);
	   StringBuilder sb = new StringBuilder();
	    while (rs.next()) {
	        String productID = rs.getString("Product_ID");
	       // String orderID = rs.getString("Order_ID");
	        int amount = rs.getInt("Amount");
	        double price = rs.getDouble("Price");
	        int polID = rs.getInt("POL_ID");
	        sb.append(String.format("Product # %d\n Product ID: %s\n Quantity: %d\n Price: \u00A3%.2f\n\n", 
	        		polID, productID, amount, price));
	    }
	    return sb.toString();
	}
	
//public static void main(String[] args) throws SQLException {
//	DBorder db = new DBorder();
//	System.out.println(db.getOrderProductById("1"));
//}
}

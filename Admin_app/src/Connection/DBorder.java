package Connection;

import java.sql.SQLException;
import java.time.DayOfWeek;
import java.time.LocalDate;
import java.time.LocalDateTime;

import com.mysql.jdbc.PreparedStatement;

import java.sql.Date;
import java.sql.ResultSet;
import java.util.List;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


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
	
	public ResultSet getOrderProductById(String ID) throws SQLException {
	  String sql = "SELECT * FROM linked_product_order WHERE Order_ID='"+ID+"'";
	  ResultSet rs = getStmt().executeQuery(sql);
	  return rs;
	}
	
	public void getOrdersInAWeek() throws SQLException {

		 LocalDate startDate = LocalDate.now().minusWeeks(1);
		 
			//make an sql statement
		  // Construct the SQL query to count the number of orders for each date
	        String sql = "SELECT DATE(created_at) AS date, COUNT(*) AS count FROM orderb "
	                   + "WHERE created_at BETWEEN ? AND ?"
	                   + "GROUP BY date ORDER BY date ASC;";		//create a preepared stmt
			preparedStmt = getConnection().prepareStatement(sql);
		//Insert Parameter Value(s) into prepared stmt
			 
			preparedStmt.setDate(1, Date.valueOf(startDate));
			preparedStmt.setDate(2, Date.valueOf(LocalDate.now()));
			
			//execute the query
			ResultSet rs = preparedStmt.executeQuery();
			 HashMap<String, Integer> data = new HashMap<>();
			while(rs.next()) {
		         String date = rs.getString("date");
		            int count = rs.getInt("count");
		            data.put(date, count);
		            
		            System.out.println(date +" ++ " + "Count: " + count);
			}
//	List<Pair<String, Double>> data = new ArrayList<>();
//		Map<String, Double> salesByDay = new HashMap<>();

//		while (rs.next()) {
//		    LocalDate createdDate = rs.getDate("created_at").toLocalDate();
//		    String dayOfWeek = createdDate.getDayOfWeek().toString();
//
//		    Double sales = salesByDay.getOrDefault(dayOfWeek, 0.0);
//		    salesByDay.put(dayOfWeek, sales + rs.getDouble("Order_Total_Price"));
//		}
//
//		for (DayOfWeek day : DayOfWeek.values()) {
//		    Double sales = salesByDay.getOrDefault(day.toString(), 0.0);
//		    data.add(new Pair<>(day.toString(), sales));
//		}
	}
	


	public static void main(String[] args) throws SQLException {
	DBorder db = new DBorder();
	
	try {
		db.getOrdersInAWeek();
	} catch (SQLException e) {
	    // handle the exception here
	    System.out.println("SQLException occurred: " + e.getMessage());
	}
	}
}

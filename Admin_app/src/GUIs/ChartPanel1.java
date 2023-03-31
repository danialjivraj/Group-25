package GUIs;

import java.awt.Dimension;
import java.awt.image.BufferedImage;
import java.util.Collections;
import java.util.Comparator;
import java.util.Map;

import javax.swing.JPanel;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.ChartUtilities;
import org.jfree.chart.ChartFactory;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.plot.PlotOrientation;
import org.jfree.data.category.DefaultCategoryDataset;




public class ChartPanel1 extends JPanel {
    private JFreeChart chart;
    
    

    public ChartPanel1() {
        setPreferredSize(new Dimension(500, 300)); // set the size of the panel
        chart = ChartFactory.createBarChart(
                "Orders in the past week",
                "Date",
                "Number of orders",
                new DefaultCategoryDataset(),
                PlotOrientation.VERTICAL,
                false,
                false,
                false
        );
        
        
        chart.setAntiAlias(true); // enable anti-aliasing
        chart.setTextAntiAlias(true); // enable text anti-aliasing
        ChartUtilities.applyCurrentTheme(chart);
        BufferedImage image = chart.createBufferedImage(800, 600);
        //these lines add graph to Panel
        ChartPanel chartPanel = new ChartPanel(chart);
        chartPanel.setPreferredSize(new Dimension(500, 300)); // set the size of the chart
        add(chartPanel);
    }

    public void updateDataset(Map<String, Integer> data) {
        DefaultCategoryDataset dataset = (DefaultCategoryDataset) chart.getCategoryPlot().getDataset();
        dataset.clear();
        for (Map.Entry<String, Integer> entry : data.entrySet()) {
//        	System.out.println("Adding data point: " + entry.getKey() + ", " + entry.getValue());
            dataset.addValue(entry.getValue(), "Orders", entry.getKey());
        }
    }

    
    
//    public static void main(String[] args) {
//		ChartPanel1 c = new ChartPanel1();
//		c.updateDataset(null);;
//	}
}


package GUIs;

import java.awt.Dimension;

import org.jfree.chart.ChartFactory;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.plot.PiePlot;
import org.jfree.data.general.DefaultPieDataset;

import java.awt.image.BufferedImage;

import java.util.Map;

import javax.swing.JPanel;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.ChartUtilities;


public class ChartPanel2 extends JPanel{

	 private JFreeChart chart;
//	 PiePlot plot;
	    
	    

public ChartPanel2() {
    setPreferredSize(new Dimension(500, 300)); // set the size of the panel
	        chart = ChartFactory.createPieChart(
	        		"Order Status Distribution",
	                new DefaultPieDataset(),
	                true,
	                true,
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
	
	public void updateDataset(Map<String, Integer> data){
		PiePlot plot = (PiePlot) chart.getPlot();
		DefaultPieDataset dataset = (DefaultPieDataset) plot.getDataset();
		   	
        for (Map.Entry<String, Integer> entry : data.entrySet()) {
	            dataset.setValue(entry.getKey(), entry.getValue());
        }
	}
}

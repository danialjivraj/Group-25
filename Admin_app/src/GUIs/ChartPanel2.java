package GUIs;

import java.awt.BasicStroke;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Font;

import org.jfree.chart.ChartFactory;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.plot.PiePlot;
import org.jfree.chart.renderer.category.StandardBarPainter;
import org.jfree.data.general.DefaultPieDataset;
import org.jfree.ui.RectangleInsets;

import java.awt.image.BufferedImage;

import java.util.Map;

import javax.swing.JPanel;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.ChartUtilities;
import org.jfree.chart.StandardChartTheme;
import org.jfree.chart.renderer.category.BarRenderer;



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
	        StandardChartTheme theme = (StandardChartTheme)org.jfree.chart.StandardChartTheme.createJFreeTheme();

	        theme.setTitlePaint( Color.decode( "#4572a7" ) );
	        theme.setExtraLargeFont( new Font("Order Status Distribution",Font.PLAIN, 16) ); //title
//	        theme.setLargeFont( new Font(fontName,Font.BOLD, 15)); //axis-title
//	        theme.setRegularFont( new Font(fontName,Font.PLAIN, 11));
	        theme.setRangeGridlinePaint( Color.decode("#C0C0C0"));
	        theme.setPlotBackgroundPaint( Color.white );
	        theme.setChartBackgroundPaint( Color.white );
	        theme.setGridBandPaint( Color.red );
	        theme.setAxisOffset( new RectangleInsets(0,0,0,0) );
	        theme.setBarPainter(new StandardBarPainter());
	        theme.setAxisLabelPaint( Color.decode("#666666")  );
	        theme.apply(chart);
	        ChartUtilities.applyCurrentTheme(chart);

//	        chart.getCategoryPlot().setOutlineVisible( false );
//	        chart.getCategoryPlot().getRangeAxis().setAxisLineVisible( false );
//	        chart.getCategoryPlot().getRangeAxis().setTickMarksVisible( false );
//	        chart.getCategoryPlot().setRangeGridlineStroke( new BasicStroke() );
//	        chart.getCategoryPlot().getRangeAxis().setTickLabelPaint( Color.decode("#666666") );
//	        chart.getCategoryPlot().getDomainAxis().setTickLabelPaint( Color.decode("#666666") );
//	        chart.setTextAntiAlias( true );
//	        chart.setAntiAlias( true );
//	        chart.getCategoryPlot().getRenderer().setSeriesPaint( 0, Color.decode( "#4572a7" ));
//	    
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

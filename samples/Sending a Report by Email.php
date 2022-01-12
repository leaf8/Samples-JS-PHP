<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Sending a Report by Email</title>
	<style>html, body { font-family: sans-serif; }</style>

	<!-- Office2013 White-Blue style -->
	<link href="../css/stimulsoft.viewer.office2013.whiteblue.css" rel="stylesheet">
	
	<!-- Stimulsoft Reports.PHP scripts -->
	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<?php
		// Creating the default events handler
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('Sending a Report by Email Handler.php', 30);
	?>
	
	<script type="text/javascript">
		// Creating the Viewer options
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_settings.htm
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		options.toolbar.showSendEmailButton = true;
		
		// Creating the Viewer control
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_deployment.htm
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
		
		// Sending report by Email on the server-side
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_viewer_send_email.htm
		viewer.onEmailReport = function (args) {
			
			// Calling the server-side handler
			Stimulsoft.Helper.process(args);
		}
		
		// Creating, loading, and then assigning the report template to the Viewer
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_viewer_showing_reports_and_dashboards.htm
		var report = Stimulsoft.Report.StiReport.createNewReport();
		report.loadFile("../reports/SimpleList.mrt");
		viewer.report = report;
		
		function onLoad() {
			// Rendering the Viewer control in the specified position
			viewer.renderHtml("viewerContent");
		}
	</script>
</head>
<body onload="onLoad();">
	<div id="viewerContent"></div>
</body>
</html>
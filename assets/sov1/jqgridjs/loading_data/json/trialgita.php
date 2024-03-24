<!DOCTYPE html>
<html lang="en">
<head>
    <!-- The jQuery library is a prerequisite for all jqSuite products -->
    <script type="text/ecmascript" src="../../../js/jquery.min.js"></script> 
    <!-- This is the Javascript file of jqGrid -->   
    <script type="text/ecmascript" src="../../../js/trirand/jquery.jqGrid.min.js"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="../../../js/trirand/i18n/grid.locale-en.js"></script>
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/jquery-ui.css" />
    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/trirand/ui.jqgrid.css" />
    <meta charset="utf-8" />
    <title>jqGrid Loading Data - Load Once</title>
</head>
<body>

    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>

    <script type="text/javascript"> 
        $(document).ready(function () {
		$("#jqGrid").jqGrid({                                
                url : "gita.php",                                
                datatype: "json",                      
                colModel: [
                    { label: 'sfw_id', name: 'sfw_id', key:true,width: 150 },
                    { label: 'hdw_name', name: 'hdw_name', width: 75 },
                    { label: 'Software_Name', name: 'Software_Name', width: 150 },
                    { label: 'version', name: 'version', width: 150}                    
                ],
				sortname: 'sfw_id',
				sortorder : 'asc',
				loadonce: true,
				viewrecords: true,
	        autowidth :true,
        	height:500,
        	rowNum: 2000000, //to show all records        
        	scroll: 1, //to enable paging with scroll bar
        	pager: "#jqGridPager",
        	recreateFilter:true,
        	altRows: true,
        	scrollrows: true
      		}); //end of grid


	      $('#jqGrid').navGrid('#jqGridPager',
        	  // the buttons to appear on the toolbar of the grid
        	  { edit: false, add: false, del: false, search: true, refresh: false, view: false, position: "left", cloneToTop: false });
        //});         
    });

    </script>

    <!-- This code is related to code tabs -->
    <br />
    <span style="font-size: 12px; font-family: Tahoma">Click on the Tabs below the see the relevant code for the example:</span>
    <br /><br />
    <div id="codetabs" style="width:700px; height: 400px; font-size:65%;"></div>
    <script type="text/ecmascript" src="../../../js/jquery-ui.min.js"></script>
    <script type="text/ecmascript" src="../../../js/prettify/prettify.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../css/prettify.css">
    <script type="text/ecmascript" src="../../../js/codetabs.js"></script><script type="text/ecmascript" src="../../../js/themeswitchertool.js"></script>
    
<!--    <script type="text/javascript">

        var tabData =
            [
                { name: "HTML", url: "index.html", lang: "lang-html" },
                { name: "Data.JSON", url: "data.json", lang: "lang-json" },
                { name: "Description", url: "description.txt", lang: "lang-html" }

            ];

        codeTabs(tabData);

    </script>-->
    <!-- End of code related to code tabs -->
</body>
</html>

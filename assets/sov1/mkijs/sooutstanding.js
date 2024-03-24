var grid_so = $("#Sogrid");
//$("#end_period").appendDtpicker({
//    
//					"inline": false,
//					"dateFormat": "YYYY-MM-DD",
//                                        "dateOnly": true                                        
//				});     
                                
$("#startDate").appendDtpicker({
					"inline": false,
					"dateFormat": "YYYY-MM-DD",
                                        "dateOnly": true  
				});
                                
$("#endDate").appendDtpicker({
					"inline": false,
					"dateFormat": "YYYY-MM-DD",
                                        "dateOnly": true  
				});
                                     
$("#end_period").val(0);
$("#ref_accomplishment").click(
    function(){           
       var platpor_start = $("#accomplisment_start").val(); 
       var platpor_end   = $("#accomplisment_end").val();
       var end_period    = $("#end_period").val();
       var TPPROCESS     = $("#select_process").val();        

       if (TPPROCESS == 0) { //All Data
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
            
        } else if (TPPROCESS == 1) {  // Daily Check Result
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment1/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
            
        } else if (TPPROCESS == 2) {  // Result by Series
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment2/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 3) {  // Progress Series
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment3/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 4) {  // Result by No Instruction
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment4/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 5) {  // Result by MC & Dies
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment5/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 6) {  // Result by MC & Dies
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment6/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        }  
    }
);                                 

$("#select_process").change(
    function(){          
        var platpor_start = $("#accomplisment_start").val(); 
        var platpor_end   = $("#accomplisment_end").val();
        var end_period    = $("#end_period").val();
        var TPPROCESS     = $("#select_process").val();  
      
        if (TPPROCESS == 0) { //All Data
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
            
        } else if (TPPROCESS == 1) {  // Daily Check Result
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment1/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
            
        } else if (TPPROCESS == 2) {  // Result by Series
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment2/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 3) {  // Progress Series
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment3/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 4) {  // Result by No Instruction
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment4/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 5) {  // Result by MC & Dies
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment5/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        } else if (TPPROCESS == 6) {  // Result by MC & Dies
            RefreshJQGridData(grid_accomplishment,"prodplan/Press/showdata_accomplishment6/"+platpor_start+"/"+platpor_end+"/"+TPPROCESS);
        }         
  }
);

$("#dlg-entryaccomplishmentpress").dialog({
    autoOpen: false,
    show: {
        effect: "blind",
        duration: 100
    },
    hide: {
        effect: "explode",
        duration: 100
    },
    height: 350,
    width: 800,
    modal: true,
    buttons: {
        "Close": function () {
            $("#dlg-entryaccomplishmentpress").dialog("close");},
        "Save": function() {                                         
                $("#f_entryaccomplishment").submit();                   
        }}
});


$("#pdf_accomplishment").click(function()
{   
    var startdate = $("#accomplisment_start").val();
    var enddate   = $("#accomplisment_end").val();
    var end_period= $("#end_period").val();
    var TPPROCESS = $("#select_process").val();
    var prodcode = $("#partcode").val();    
    
    window.open('prodplan/Press/report_accomplishment/'+startdate+'/'+enddate+'/'+TPPROCESS+'/'+prodcode);     
});

 $("#xls_accomplishment").on("click", function(){         
        $("#grid_accomplishment").jqGrid("exportToExcel",{
                includeLabels : true,
                includeGroupHeader : true,
                includeFooter: true,
                fileName : "Accomplishment.xlsx",
                maxlength : 40 // maxlength for visible string data 
        });
});

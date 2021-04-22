@extends('master')
@section('pageheader')
<h2>Dashbaord</h2>
@stop
@section('maincontent')
<div id="chartdiv">
</div>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<style type="text/css">
    #chartdiv {
        width       : 100%;
        height      : 500px;
        font-size   : 11px;
    }   
</style>

<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script type="text/javascript">


</script>
@stop
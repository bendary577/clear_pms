<div class="row">
    <div class="col-md-8">
        <div class="card shadow" style="border-radius:20px">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <div id="chart"> </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow" style="border-radius:20px">
            <div class="card-body">
                <h5 class="card-title">Card 2 title</h5>
                <div id="chart2"> </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

<!-- Charting library -->
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
    });

    const chart2 = new Chartisan({
        el: '#chart2',
        url: "@chart('sample_chart')",
    });
</script>

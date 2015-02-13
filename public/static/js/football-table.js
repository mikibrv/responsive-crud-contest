(function (global) {

    var FootballTable = function (tableId) {
        this.tableNode = $(tableId);
        this.dataTable = undefined;
    };

    FootballTable.prototype.init = function () {
        this.dataTable = this.tableNode.DataTable({
            responsive: true,
            sErrMode: 'throw',
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "api/teams/fetch",
                "data": function (d) {
                    console.log(d);
                },
                "type": "POST"
            }
        });
    };

    new FootballTable("#footballTable").init();

}(window));
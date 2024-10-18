var controller = new Vue({
    el: '#controller',
    data: {
        datas : [],
        data : {},
        actionUrl,
        apiUrl,
        editStatus : false
    },
    mounted: function () {
        this.datatable();
    },
    methods: {
        datatable(){
            const _this = this;
            _this.table = $('#authortables').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns: columns
            }).on('xhr', function (){
                _this.datas = _this.table.ajax.json().data;
            })
        },
        addData() {
            this.data = {};
            this.editStatus = false;
            $('#modal-default').modal();
        },
        editData(data) {
            this.data = data;
            this.editStatus = true;
            $('#modal-default').modal();
        },
        deleteData(event, id) {
            if (confirm("Are you sure?")) {
                $(event.target).parents('tr').removed();
                axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                    alert('Data has been removed');
                    location.reload();
                });
            }
        }
}});
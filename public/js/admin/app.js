const app = (() => {

    const ajax = (url, callback, method = 'get', data = {}) => {
      console.log(url)
        const options = {
            method:method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        }



        fetch(url, options)
            .then((response) => response.json)
            .then((result)=>{
                callback();
        })

    }
    const deleteRecord = () => {
        const deletes = document.querySelectorAll('.delete');
        deletes.forEach(function(value, key){
            // console.log(value);
            value.addEventListener('click', function(event){
            event.preventDefault();

    const callback = () => {
      const deletable = event.target.dataset.deletable ?? 'tr';
        event.target.closest(deletable).remove();
    }
            ajax(event.target.href, callback, 'delete');
            });
        });
        
    }

   const dataTable = () =>{
        $("#example1")
        .DataTable({
          "responsive": true, 
          "lengthChange": false, 
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        })
        .buttons()
        .container()
        .appendTo('#example1_wrapper .col-md-6:eq(0)');
      //Initialize Select2 Elements  
      $('.select2bs4').select2({
        theme: 'bootstrap4' });
      };

      const select2 = () =>{
        //Initialize Select2 Elements  
      $('.select2bs4').select2({
        theme: 'bootstrap4' });
      }

const inputInit=()=>{
  bsCustomFileInput.init();
};

const removeImage = () => {
  const removes = document.querySelectorAll('.remove-image');
  removes.forEach(function (remove, index) {
    remove.addEventListener('click', function (e) {
      e.target.closest('.old-images-block').remove();
    })
   })
   };

    return {
        init: () => {
            deleteRecord(),
            dataTable(),
            select2(),
            inputInit(),
            removeImage()
        },
    };

})();

app.init();
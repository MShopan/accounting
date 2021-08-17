 // function get data to encabsulate axios api fetch
 export  async function get_data(myurl) {
    

       return await axios({
            method: 'get',
            baseURL: 'http://127.0.0.1:8000/api/' ,
            url: myurl ,
            responseType: 'json'
           });

         

};

export class help{
    static callme(){
        return 'please call me';
    }
}




//<script id='myusersiteid' data-host='http://127.0.0.1:8000' usersite='examplebd.com' data-dnt='false' src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.min.js' data-id='378987' async defer></script>

    const nodeMap = document.getElementById('myusersiteid').attributes;
    let userID = nodeMap.getNamedItem('data-id').value;
    let dataHost = nodeMap.getNamedItem('data-host').value;
    let userSite = nodeMap.getNamedItem('usersite').value;

    //alert(userSite)

    let url = dataHost+'/api/visitorTracking';
    //let url = dataHost+"/api/getVisitorInfo";

    axios.post(url,{
    userID:userID,
    userSite:userSite
}).then((res) => {
    if(res.status == 200){
    if(res.data == 10){
    console.log('Fail');
    console.log(res.data)
}else{
    console.log('success');
    console.log(res.data)
}
}else{
    console.log('False Request');
}
}).catch((err) => {
    console.log('Somthing Went Wrong');
})

function onLoad(pageName) {
    if (pageName == "index") {
        insertHtml("main", "pages/openedpost.html", false, false);
        insertHtml("body", "pages/main.html", false, true);
       
        addContainer('mainContainer', 18, "../images/defaultimage2.png");       

    } else if (pageName == "home") {      
        insertHtml("main", "pages/openedpost.html", false, false);
        insertHtml("body", "pages/home.html", false, true);

        addContainer('myPostsContainer', 25, "../images/defaultimage2.png");

    } else if (pageName == "login") {
        insertHtml("body", "pages/login.html", false, true);

    } else if (pageName == "register") {
        insertHtml("body", "pages/register.html", false, true);

    } else if (pageName == "newpost") {
        insertHtml("body", "pages/newpost.html", false, true);

    }

    setButtonsAnimations();
}

function onLoadRedirect(pageName, isAccessAllowed) {
    var loginBtn = document.getElementById("loginbtn");
    
    if(isAccessAllowed == false){
        loginBtn.innerHTML = "Log In";

        if (pageName == "register") {
            insertHtml("body", "pages/register.php", false, true);  
        } else {
            insertHtml("body", "pages/login.php", false, true);  
        }     
    }
    else{
        loginBtn.innerHTML = "Log Out";

        if (pageName == "main") {
            insertHtml("main", "pages/openedpost.php", false, false);
            insertHtml("body", "pages/main.php", false, true);
           
            //addContainer('mainContainer', 18, "images/defaultimage.png");       
    
        } else if (pageName == "home") {      
            insertHtml("main", "pages/openedpost.php", false, false);
            insertHtml("body", "pages/home.php", false, true);
    
            //addContainer('myPostsContainer', 25, "images/defaultimage.png");
    
        } else if (pageName == "login" || pageName == "register") {            
            window.location="pages/logout.php";
        } else if (pageName == "newpost") {
            insertHtml("body", "pages/newpost.php", false, true);
    
        }
    }
    

    setButtonsAnimations();
}

function insertHtml(destinationId, pageId, isAsync, clearBeforeInserting) {
    var xhr = new XMLHttpRequest();
    var container = document.getElementById(destinationId);

    console.log(xhr);

    xhr.onload = function () {
        if (this.status === 200) {
            if (clearBeforeInserting == false) {
                container.innerHTML = container.innerHTML + xhr.responseText;
            } else {
                container.innerHTML = xhr.responseText;
            }
           

        } else {
            console.warn('Did not recieve 200 OK from response!');
        }
    };

    xhr.open('get', pageId, isAsync);
    xhr.send();
}

function stopPropagationBackground(event) {
    event.stopPropagation();
}

function setButtonsAnimations() {
    var greenButtons = document.getElementsByClassName("greenBtn");
    var blueButtons = document.getElementsByClassName("blueBtn");
    var redButtons = document.getElementsByClassName("redBtn");

    for (var i = 0; i < greenButtons.length; i++) {
        greenButtons[i].addEventListener("mouseenter", function (event) {
            event.target.classList.toggle("greenBtnAnim");
        }, false);

        greenButtons[i].addEventListener("mouseleave", function (event) {
            event.target.classList.toggle("greenBtnAnim");
        }, false);
    }

    for (var i = 0; i < blueButtons.length; i++) {
        blueButtons[i].addEventListener("mouseenter", function (event) {
            event.target.classList.toggle("blueBtnAnim");
        }, false);

        blueButtons[i].addEventListener("mouseleave", function (event) {
            event.target.classList.toggle("blueBtnAnim");
        }, false);
    }

    for (var i = 0; i < redButtons.length; i++) {
        redButtons[i].addEventListener("mouseenter", function (event) {
            event.target.classList.toggle("redBtnAnim");
        }, false);

        redButtons[i].addEventListener("mouseleave", function (event) {
            event.target.classList.toggle("redBtnAnim");
        }, false);
    }
}

function addContainer(parentDivId, numbOfBlocks, imgSrc) {
    for (var i = 0; i < numbOfBlocks; i++) {
        var newDiv = $("<img></img>")

        newDiv.css("backgroundColor", "gray");
        newDiv.css("borderStyle", "none");    
        newDiv.attr("src", imgSrc);

        newDiv.attr("id", "img_div_" + i);       
        newDiv.on("click", openClosePost);
        
        $("#" + parentDivId).append(newDiv);
    }
}

function openClosePost_2() {
    var post = $("#openedPostBackGroundContainer");

    if (post.css("visibility") == "visible") {
        post.css("visibility", "hidden");
        post.toggleClass("visibilityAnim");
        post.css("opacity", "0.0");

    } else {
        post.css("visibility", "visible");
        post.toggleClass("visibilityAnim");
    }
}

function openClosePost(event) {
    var post = $("#openedPostBackGroundContainer");

    if (post.css("visibility") == "visible") {
        post.css("visibility", "hidden");
        post.toggleClass("visibilityAnim");
        post.css("opacity", "0.0");

    } else {
        post.css("visibility", "visible");
        post.toggleClass("visibilityAnim");

        // var openedPostId = event.currentTarget.id;
        document.getElementById("postOwnerName").innerHTML = event.target.getAttribute('owner_name');
        document.getElementById("postImage").src = event.target.getAttribute('src');
        document.getElementById("postDescription").innerHTML = event.target.getAttribute('desc');
        document.getElementById("follow_or_remove").value = event.target.getAttribute('img_id');
        // var postImg = document.getElementById(openedPostId)

        // console.log("----------------");    
        // console.log(event.currentTarget.id);
        // console.log(event.target.getAttribute('desc'));
        // console.log(event.target.getAttribute('src'));
        // console.log(event.target.getAttribute('owner_name'));
        // console.log("----------------");
    }   
}
function redirectToLoginPage(isAccessAllowed){
    var loginBtn = document.getElementById("loginbtn");

    if(isAccessAllowed == false){
        loginBtn.innerHTML = "Log In";
        insertHtml("body", "pages/login.php", false, true);
        return true;
    }else{
        loginBtn.innerHTML = "Log Out";
        insertHtml("body", "pages/login.php", false, true);
        return false;
    }
    
           
}
function openMainPage(imgArrString, isAccessAllowed){
    //onLoadRedirect('main', isAccessAllowed);
    if(redirectToLoginPage(isAccessAllowed))
    {       
        return;
    }
    
    insertHtml("main", "pages/openedpost.php", false, false);
    insertHtml("body", "pages/main.php", false, true);
    
    var followBtn =  document.getElementById("followOrRemovePostBtn");

    document.getElementById("followOrRemovePostLabel").innerHTML = "Follow";
    document.getElementById("followOrRemovePostForm").action = "confirmfollow.php";
    followBtn.style.backgroundColor = "#69C2FF";

    if(followBtn.classList.contains("redBtn"))
    {
        followBtn.classList.toggle("redBtn");
    }
    if(!followBtn.classList.contains("blueBtn"))
    {
        followBtn.classList.toggle("blueBtn");
    }
    
    if(imgArrString != null)
    {
        var jsonData = JSON.stringify(imgArrString);
        jsonData = JSON.parse(jsonData);
       
        for (var i = 0; i < jsonData.length; i++) {
            var newDiv = $("<img></img>")
    
            newDiv.css("backgroundColor", "gray");
            newDiv.css("borderStyle", "none");    
            newDiv.attr("src", "images/" + jsonData[i].image);
            newDiv.attr("desc", jsonData[i].text);
            newDiv.attr("owner_name", jsonData[i].owner_name);   
            newDiv.attr("id", "img_div_" + i);  
            newDiv.attr("img_id", jsonData[i].id);
    
            newDiv.on("click", openClosePost);
            newDiv.myParam = jsonData[i].text;
            
            $("#" + "mainContainer").append(newDiv);       
        }
    
    }
    setButtonsAnimations();
    //addContainer('mainContainer', 18, "images/defaultimage2.png"); 

    // var jsonData = JSON.stringify(imgArrString);//JSON.parse(imgArrString);
    // jsonData = JSON.parse(jsonData);
    // //Log the data to the console
    // console.log(jsonData);
}
function openHomePage(imgArrString, isAccessAllowed){
    //onLoadRedirect('home', isAccessAllowed);
    if(redirectToLoginPage(isAccessAllowed))
    {       
        return;
    }

    insertHtml("main", "pages/openedpost.php", false, false);
    insertHtml("body", "pages/home.php", false, true);
    
    var removePostBtn =  document.getElementById("followOrRemovePostBtn");

    document.getElementById("followOrRemovePostLabel").innerHTML = "Remove post";
    document.getElementById("followOrRemovePostForm").action = "confirmremovepost.php";
    removePostBtn.style.backgroundColor = "#e93f3f";

    if(!removePostBtn.classList.contains("redBtn"))
    {
        removePostBtn.classList.toggle("redBtn");
    }
    if(removePostBtn.classList.contains("blueBtn"))
    {
        removePostBtn.classList.toggle("blueBtn");
    }
    

    if(imgArrString != null)
    {
        var jsonData = JSON.stringify(imgArrString);
        jsonData = JSON.parse(jsonData);
        
        for (var i = 0; i < jsonData.length; i++) {
            var newDiv = $("<img></img>")
    
            newDiv.css("backgroundColor", "gray");
            newDiv.css("borderStyle", "none");    
            newDiv.attr("src", "images/" + jsonData[i].image);
            newDiv.attr("desc", jsonData[i].text);
            newDiv.attr("owner_name", jsonData[i].owner_name);   
            newDiv.attr("id", "img_div_" + i);  
            newDiv.attr("img_id", jsonData[i].id); 
    
            newDiv.on("click", openClosePost);
            newDiv.myParam = jsonData[i].text;
            
            $("#" + "myPostsContainer").append(newDiv);       
        }  
    }
    setButtonsAnimations();
    //addContainer('mainContainer', 18, "images/defaultimage2.png"); 

    // var jsonData = JSON.stringify(imgArrString);//JSON.parse(imgArrString);
    // jsonData = JSON.parse(jsonData);
    // //Log the data to the console
    // console.log(jsonData);
}
function openLoginRegisterPage(pageName, isAccessAllowed){
    var loginBtn = document.getElementById("loginbtn");
    
    if(isAccessAllowed == false){
        loginBtn.innerHTML = "Log In";

        if (pageName == "register") {
            insertHtml("body", "pages/register.php", false, true);  
        } else {
            insertHtml("body", "pages/login.php", false, true);  
        }     
    }
    else{
        loginBtn.innerHTML = "Log Out";
             
        window.location="pages/logout.php";    
    }
    setButtonsAnimations();
}

function showChosenImg(event){
    const [file] = fileUploadInput.files
    if (file) {
        postImgContainer.src = URL.createObjectURL(file)
    }
}



//addContainer, openClosePost napisane w 'czystym' JS`sie

//function openClosePost() {//postId
//    var post = document.getElementById('openedPostBackGroundContainer');

//    if (post.style.visibility == "visible") {
//        post.style.visibility = "hidden";
//        post.classList.toggle("visibilityAnim");
//        post.style.opacity = "0.0";

//    } else {
//        post.style.visibility = "visible";
//        post.classList.toggle("visibilityAnim");
//    }
//}

//function addContainer(parentDivId, numbOfBlocks, imgSrc) {
//    for (var i = 0; i < numbOfBlocks; i++) {
//        var newDiv = document.createElement("img");
//        newDiv.style.backgroundColor = "gray";
//        newDiv.style.borderStyle = "none";
//        newDiv.src = imgSrc;
//        newDiv.id = "img_div_" + i;
//        var my_div = document.getElementById(parentDivId);
//        newDiv.addEventListener('click', openClosePost);

//        my_div.appendChild(newDiv);
//    }
//}
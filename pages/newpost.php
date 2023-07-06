
<div class="mainContainer" id="mainContainer">
    <div class="postCreatingContainer" id="postCreatingContainer">
        <div class="postImgContainer" >
            <img id="postImgContainer" src="images/defaultimage.png" alt="bruh" >
        </div>
        <div class="postInfoContainer" id="postInfoContainer">
            
            <form method="post" action="confirmupload.php" enctype="multipart/form-data" class="newPostForm">
                <input type="hidden" name="size" value="1000000">
                <h1>New post</h1>
                <label for="story">Description:</label>
              
                <textarea name="text" cols="33" rows="5" placeholder="Type your description here."></textarea>   

                <input type="file" id="fileUploadInput" name="image" onchange="showChosenImg(event)">             
                <label for="fileUploadInput" class="fileUploadLabel blueBtn">
                    <p>Upload Image</p>
                </label>   

                <button type="submit" name="upload" class="createpostbtn greenBtn">
                    <p>Confirm</p>
                </button>           
            </form>  
                  
        </div>
    </div>
</div>
<div class="openedPostBackGroundContainer" id="openedPostBackGroundContainer" onclick="openClosePost()">
    <div class="openedPostContainer" id="openedPostContainer" onclick="stopPropagationBackground(event)">
        <div class="openedImgContainer" id="openedImgContainer">
            <img src="images/defaultimage.png" alt="bruh" id="postImage">
        </div>
        <div class="openedInfoContainer" id="openedInfoContainer">
            <div class="postAuthorContainer" id="postAuthorContainer">
                <img src="images/defaultavatar.png" alt="bruh">
                <div class="followContainer" id="followContainer">
                    <p id="postOwnerName">Big Floppa 0372</p>
                    <form method="post" id="followOrRemovePostForm" action="confirmremovepost.php" onsubmit="return confirm('Do you really want to remove the post?');">            
                        <input type="hidden" id="follow_or_remove" name="follow_or_remove" value="bruh">
                        <button type="submit" id="followOrRemovePostBtn" class="followbtn blueBtn">
                            <p id="followOrRemovePostLabel">Follow</p>
                        </button>
                    </form>                 
                </div>
            </div>

            <div class="postDescriptionContainer" id="postDescriptionContainer">
                <p id="postDescription">
                    We were in the park with my friends yesterday,
                    the time has been spent beautifully.
                </p>
            </div>
        </div>
    </div>
</div>
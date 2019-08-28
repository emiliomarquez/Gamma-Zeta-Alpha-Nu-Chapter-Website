<!DOCTYPE html >
<html>
		<head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<title>Update Events</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="/js/vendor/bootstrap.min.js"></script>
		<script src="/js/main.js"></script>
		<script>
			$(document).ready(function(e) {
                $("#imgDesc").change(function(e) {
					$(this).val($(this).val().replace(/&/g, "%26"));
                    $("#previmg").attr("src", $(this).val().replace(/%26/g,"&"));
                });
            });
		</script>
		</head>

		<body>
        <form action="validate.php" method="post" >
          <table >
            <tr>
              <td><label for="eventName" >Event Name:</label></td>
              <td><input id="eventName" type="text" name="eventName" required></td>
              <td><label for='imgDesc' >Image Url:</label></td>
              <td><input type="url" id="imgDesc" name="imgDesc"></td>
            </tr>
            <tr>
              <td><label for="eventDate" >Date of Event</label></td>
              <td><input id="eventDate" name="eventDate" type="date" required></td>
              <td colspan="2">If your image does not appear below after you have inserted the url, then the url is broken or invalid.<br><img id="previmg" alt="Preview Image" width="250" /></td>
            </tr>
            <tr>
              <td><label for="eventBTime" >Time of Event</label></td>
            </tr>
            <tr>
              <td colspan="2"><input id="eventBTime" name="eventBTime" type="time" required>
                to
                <input id="eventETime" name="eventETime" type="time" required></td>
            </tr>
            <tr>
              <td><label for="loc" >Location:</label></td>
              <td><input type="text" id="loc" name="loc" ></td>
            </tr>
            <tr>
              <td><label for="type" >Event Type:</label></td>
              <td><select id="type" name="type" required>
                  <option value="Brotherhood" >Brotherhood</option>
                  <option value="Community Service">Community Service</option>
                  <option value="Academic">Academic</option>
                  <option value="Social">Social</option>
                  <option value="Fundraiser">Fundraiser</option>
                  <option value="Fundraiser/Community Service" >Fundraiser/Community Service</option>
                  <option value="Promotional" >Promotional</option>
                </select></td>
            </tr>
            <tr>
              <td><label for="with" >Collaboration <br>
                  Organization:</label></td>
              <td><input type="text" id="with" name="with" ></td>
            </tr>
            <tr>
              <td><label for="description">Event Description</label></td>
            </tr>
            <tr>
              <td colspan="2"><textarea id="description" name="description"  cols="50" rows="20" required></textarea></td>
            </tr>
            <tr>
              <td><label for="pwc" >Password</label></td>
              <td><input type="password" name="pwc" required></td>
            </tr>
            <tr>
              <td colspan="2" align="right" ><input type="submit" ></td>
            </tr>
          </table>
        </form>
</body>
</html>
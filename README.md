This repository contains the source code of a e-voting API. The API was built with Laravel. The site of this app is https://evoting-api.herokuapp.com/.


## API Contents

This applications contains two major datas that can be accessed, users (voters) and candidates. 


### Users data
Users data contains identity of each user who already registered to the e-voting app.

Available routes:
1. Retrieve all registered users (GET)
This route is available for public use. This route can be accessed via https://evoting-api.herokuapp.com/api/users and requested with GET method on Postman. This route will return firtsname and lastname of every registered users.

2. Register a new user (POST)
This route can only be accessed on Postman with POST method on https://evoting-api.herokuapp.com/api/users. The data of new voter can be sent with raw JSON form.
This is the correct JSON to send new voter data:
```
{
    "user_id" : "",
    "firstname" : "",
    "lastname" : "",
    "password" : "",
    "role_id" : "",
    "organizer_id" : "",
    "election_id" : ""
}
```

Note:
-user_id can only consisted of alphabet (lowercase and uppercase) and numbers.
-firstname and lastname can only contains alphabet with uppercase for the first letter. lastname are not required.
-password have a minimum of 8 characters.
-role_id, organizer_id, and election_id can only receive a single number.
-Available input for role_id: 1 (voter role).
-Available input for organizer_id: 1 (BEM UI).
-Available input for election_id: 1 (Pemira UI).
-There will be another input number for organizer_id and eletion_id in the future.


3. Retrieve a voter's identity (GET/{user_id})
Access a voter's identity is provided by user_id. Each user should only know their own user_id. Therefore, accessing user's identity can only be achieved after accessing 'login' route.

4. Login route (LOGIN)
This login route provide secure way to access user's idenity since each user should only know their own user_id and password. This route can be accessed via POST method on http://evoting-api.herokuapp.com/api/login. The login form sent via raw JSON with the format available below:
```
{
    "user_id" : "",
    "password" : ""
}
```

5. Update user identity (PUT/{user_id})
User can also edit their stored identity by accessing PUT method on http://evoting-api.herokuapp.com/api/users/{your user_id}. Edit method is available but limited, since user can't edit their password and role_id (role_id only accept '1' as input.). And also, there is no other alternative input for organizer_id and election_id. The correct JSON format to send updated data is:
```
{
    "user_id" : "",
    "firstname" : "",
    "lastname" : "",
    "organizer_id" : "",
    "election_id" : ""
}
```

6. Delete an existing user (DELETE/{user_id})
Since only each user know their own user_id, deleting a user can only be achieved by themselves. This route accessed with DELETE method on http://evoting-api.herokuapp.com/api/users/{your user_id}.


### Candidates data
This data section contains all available information about candidates listed for election.

Available routes:
1. Retrieve all available candidates (GET)
This route is available for public use. This route can be accessed via https://evoting-api.herokuapp.com/api/candidates and requested with GET and return all candidates listed on every election.

2. Input a new candidate (POST)
This route can only be accessed on Postman with POST method on https://evoting-api.herokuapp.com/api/candidates. The data of new voter can be sent with raw JSON form.
This is the correct JSON to send new voter data:
```
{
    "name" : "",
    "order_no" : "",
    "vision" : "",
    "election_id" : ""
}
```

Note:
-name can only consisted of alphabet (lowercase and uppercase).
-order_no can only receive a single digit number.
-vision can receive alphabet and numbers.
-election_id can only receive a single number. Available input for election_id: 1 (Pemira UI).

3. Retrieve a voter's identity (GET/{id})
Each candidate's data can be accessed by writing the correct id of each candidates. This can be achieved by GET method on https://evoting-api.herokuapp.com/api/candidates/{id} on Postman or web browser.

4. Update user identity (PUT/{id})
While storing a candidate's data, an error on typing may accidentally occur. Editing a candidate's data is available via PUT method on https://evoting-api.herokuapp.com/api/candidates/{id} on Postman. The updated data can be sent via raw JSON with the format as below:
```
{
    "name" : "",
    "order_no" : "",
    "vision" : "",
}
```

Note:
-eletion_id is not available for editing since its considered "easy to write" and thus not a common source of typing error. If the error occurs, only web administrator can fix it.

5. Delete a candidate from list
There is no route for deleting a candidate. Candidate deletion (because of wrong data input) can be requested to web administrator.


## Testing

To test the API, you can:
1. Register a new user with the correct requirement.
This way, you can test all the possible route from the user section. You can:
   1. Register a new user, 
   2. try to login with your password,
   3. edit the registered data, and/or
   4. delete your newly created user 

2. Use the available user data for test purpose.
Available user data:
```
{
    "user_id" : "voter1234",
    "firstname" : "New",
    "lastname" : "Voter",
    "password" : "voterbaru",
    "role_id" : "1",
    "organizer_id" : "1",
    "election_id" : "1"
}
```
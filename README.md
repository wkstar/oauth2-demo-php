# oAuth System
## Login
![oAuth Login](http://stash.iteedevelopment.com:7990/projects/GOLF/repos/oauth-application/browse/docs/images/oauthLogin.png?at=8beb9419a962e9998b2a8f7501bef36639d294a8&raw)

To check login details, use the oAuth class, login function:
```sh
    $user_name = $_REQUEST['user_name'];
    $user_pwd = $_REQUEST['user_pwd'];
    ...
    $oAuth = $this->oAuth->login($user_name, $user_pwd);
    
    //Any sort of error with authentication.
    if( isset($oAuth['error']) || 
        !isset($oAuth['access_token'])) {
        
        //Deal with errors
        ...
        
    }
    //Return access token to client (mobile app).
    $oAuthAccessToken = $oAuth['access_token'];
```

## Authorise
![oAuth Authorise](http://stash.iteedevelopment.com:7990/projects/GOLF/repos/oauth-application/browse/docs/images/oauthAuthorise.png?at=8beb9419a962e9998b2a8f7501bef36639d294a8&raw)

```sh
    $this->username = $this->oAuth->checkScope();
```



### Tasks
- [x] Install oAuth server.
- [ ] Ensure database structure is created from sql scripts.
- [ ] Write tests for all Controllers.
- [ ] Remove references to old token in all PHP.
- [ ] Remove sys_user.token in mySql.
- [ ] Add a call to the checkScope function for every Controller that needs the user to be logged in.
- [ ] Define the Authority required for each Controller.
- [ ] Make sure the logic in the oAuth server defining each user's Authority is correct.

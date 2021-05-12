import React from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from 'react-router-dom';
import ProfileEdit from './ProfileEdit';
import Form from './Form';

const EditLink = ({ profileName }) => {
  return (
    <Router>
      <div>
        <Link to="/edit">プロフィール編集</Link>
        <Switch>
          <Route path='/edit'>
            <Form />
            <ProfileEdit profileName={profileName} />
          </Route>
        </Switch>
      </div>
    </Router>
  )
}

export default EditLink;

import React from 'react';
import { Link } from 'react-router-dom'

class Navbar extends React.Component {
    render() {
        return (
            <div>
                <Link to="/image">Image</Link>
                <Link to="/post">Post</Link>
            </div>
        )
    }
}

export default NavBar;
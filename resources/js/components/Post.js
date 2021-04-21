import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Post extends Component {
    render() {
        return (
            <div>
                <p>ポスト</p>
            </div>
        );
    }
}

if (document.getElementById('post')) {
    ReactDOM.render(<Post />, document.getElementById('post'));
}



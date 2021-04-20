import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Image extends Component {
    render() {
        return (
            <div>
                <p>イメージ</p>
            </div>
        );
    }
}

if (document.getElementById('image')) {
    ReactDOM.render(<Image />, document.getElementById('image'));
}
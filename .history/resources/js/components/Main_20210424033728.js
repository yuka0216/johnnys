import { Router, Route, Link } from 'react-router';
import ReactDOM from 'react-dom';
import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import Lightbox from "lightbox-react";
import LikeButton from './LikeButton';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Container, Row, Col } from 'react-bootstrap';
import PostsMap from './PostsMap';
import InstaViewPostIndex from './InstaViewPostIndex';
import TwitterViewPostIndex from './TwitterViewPostIndex';


console.log('main')



const Main = () => {

    const [posts, setPosts] = useState([]);

    useEffect(
        () => {
            axios
                .get('/api/mypage')
                .then((res) => {
                    console.log('res', res)
                    setPosts(res.data);
                })
                .catch((e) => {
                    console.log("e", e);
                })
        },
        []
    );

    return (
        <Container>
            <Tabs>
                <TabList>
                    <Tab>Tweet</Tab>
                    <Tab>Instagram</Tab>
                </TabList>
                <TabPanel>
                    <div>
                        <h2>全てのコメントの表示</h2>
                        <PostsMap posts={posts} view={TwitterViewPostIndex} />
                    </div>
                </TabPanel>
                <TabPanel>
                    <div>
                        <h2>インスタ風画像投稿だけ表示</h2>
                        <PostsMap posts={posts} view={InstaViewPostIndex} />
                    </div>
                </TabPanel>
            </Tabs>
        </Container >
    )
}


export default Main;


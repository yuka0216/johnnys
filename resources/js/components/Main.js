import ReactDOM from 'react-dom';
import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Container, Row, Col } from 'react-bootstrap';
import Posts from './Posts';
import InstaViewPostIndex from './InstaViewPostIndex';
import TwitterViewPostIndex from './TwitterViewPostIndex';
// import SetPosts from './SetPosts';
import { useLocation, Switch, Route, BrowserRouter as Router, } from 'react-router-dom';

console.log('main')

const url = window.location.pathname;
const userId = String(url);
console.log(userId);

const Main = () => {

    const [posts, setPosts] = useState([]);
    useEffect(
        async () => {
            try {
                const res = await axios.get('/api' + (userId))
                setPosts(res.data);
            } catch (e) {
                console.log("e", e);
            }
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
                        <Posts posts={posts} viewType="twitter" />
                    </div>
                </TabPanel>
                <TabPanel>
                    <div>
                        <h2>インスタ風画像投稿だけ表示</h2>
                        <div className="d-flex flex-md-wrap col-md-12">
                            <Posts posts={posts} viewType="instagram" />
                        </div>
                    </div>
                </TabPanel>
            </Tabs>
        </Container >
    )
}


export default Main;


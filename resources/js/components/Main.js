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
import Search from './search';
import "../App.css";
import SearchPosts from './SearchPosts';

const url = window.location.pathname;
const userId = String(url);

const Main = () => {

    const [posts, setPosts] = useState([]);
    const [searchPosts, setSearchPosts] = useState([]);

    useEffect(
        async () => {
            initPosts()
        },
        []
    );

    const initPosts = async () => {
        try {
            const res = await axios.get('/api' + (userId))
            setPosts(res.data);
        } catch (e) {
            console.log("e", e);
        }
    }

    const search = async (searchValue) => {
        try {
            const res = await axios.get('/api/search/' + (searchValue))
            setSearchPosts(res.data);
        } catch (e) {
            console.log("e", e);
        }
    }

    return (
        <Container>
            <Tabs>
                <TabList>
                    <Tab><img src={'/image/吹き出し.jpg'} width="40px" /></Tab>
                    <Tab><img src={'/image/カメラ.jpeg'} width="40px" /></Tab>
                    <Tab><img src={'/image/虫眼鏡.jpg'} width="40px" /></Tab>
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
                <TabPanel>
                    <div>
                        <h2>検索ページ</h2>
                        <Search search={search} />
                        <SearchPosts searchPosts={searchPosts} />
                    </div>
                </TabPanel>
            </Tabs>
        </Container >
    )
}

export default Main;


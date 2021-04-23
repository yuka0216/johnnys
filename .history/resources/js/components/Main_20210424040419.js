import { Router, Route, Link } from 'react-router';
import ReactDOM from 'react-dom';
import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Container, Row, Col } from 'react-bootstrap';
import PostsMap from './PostsMap';
import InstaViewPostIndex from './InstaViewPostIndex';
import TwitterViewPostIndex from './TwitterViewPostIndex';
import SetPosts from './SetPosts';


console.log('main')



const Main = () => {

    <SetPosts />

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
                        <PostsMap posts={SetPosts} view={TwitterViewPostIndex} />
                    </div>
                </TabPanel>
                <TabPanel>
                    <div>
                        <h2>インスタ風画像投稿だけ表示</h2>
                        <div className="d-flex flex-md-wrap col-md-12">
                            <PostsMap posts={SetPosts} view={InstaViewPostIndex} />
                        </div>
                    </div>
                </TabPanel>
            </Tabs>
        </Container >
    )
}


export default Main;


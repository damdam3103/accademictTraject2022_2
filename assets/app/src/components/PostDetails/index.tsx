import React from 'react';
import Card from "react-bootstrap/Card";
import {Button} from "react-bootstrap";

const PostDetails = (props: any) => {
	const {post} = props;
	return (
		<Card className="mb-2">
			<Card.Body>
				<Card.Title>
					{post.title}
				</Card.Title>
				<Card.Text>
					{post.message}
				</Card.Text>
				<Button variant="info"><a href="" >Show details</a></Button>
				<Button variant="warning"><a href="" >Edit</a></Button>
			</Card.Body>
		</Card>
	);
};

export default PostDetails;

/**
 * <div class="card mb-2">
 * 			<div class="card-body">
 * 				<h5 class="card-title">{{ post.title }}</h5>
 * 				<p class="card-text">{{ post.message | raw }}</p>
 * 				<a href="#" onclick="likePost({{ post.id }})" class="card-link text-decoration-none text-dark"><i
 * 							class="bi bi-hand-thumbs-up"></i>: {{ post.likes }} like
 * 					this</a>
 * 				<hr >
 * 				<small>
 * 					{% for comment in post.comments %}
 * 						{{ comment.message }} by {{ comment.author }} <br>
 * 					{% endfor %}
 * 				</small>
 * 				<hr >
 * 				<a href="{{ path('post_details', {id: post.id}) }}" class="btn btn-info">Show details</a>
 * 				<a href="{{ path('post_edit', {id: post.id}) }}" class="btn btn-warning">EDIT</a>
 * 			</div>
 * 		</div>
 */
